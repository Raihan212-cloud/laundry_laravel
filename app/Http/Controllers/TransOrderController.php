<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\TransDetails;
use App\Models\TransOrders;
use App\Models\TypeOfServices;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB; // Add this line
use Midtrans\Config;
use Midtrans\Snap;

class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTO', false); // Typo here, should be MIDTRANS_IS_PRODUCTION
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }


    public function index()
    {
        $title = "Transaksi Order";
        $datas = TransOrders::with('customer')->orderBy('id', 'desc')->get();
        return view('trans.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() + 1;
        $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT); //001
        $title = "Tambah Transaksi";
        $orderCode = "TR-" . $today . "-" . $runningNumber;

        $customers = Customers::OrderBy('name', 'asc')->get(); // Order by name for better UX
        $services = TypeOfServices::OrderBy('service_name', 'asc')->get(); // Order by name for better UX

        return view('trans.laundry', compact('title', 'orderCode', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming JSON data
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array|min:1',
            'items.*.service_id' => 'required|exists:type_of_services,id',
            'items.*.weight' => 'required|numeric|min:0.1',
            'items.*.subtotal' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        DB::beginTransaction(); // Start database transaction

        try {
            // Generate unique order code (if not passed from frontend or for server-side generation)
            $today = Carbon::now()->format('dmY');
            $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() + 1;
            $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
            $orderCode = "TR-" . $today . "-" . $runningNumber;


            $transOrder = TransOrders::create([
                'id_customer' => $request->customer_id,
                'order_code' => $orderCode, // Use server-generated order code
                'order_end_date' => Carbon::now()->addDays(2), // Assuming 2 days for completion
                'total' => $request->total_amount,
                'notes' => $request->notes, // Save notes if available
                'status' => 'pending', // Default status
            ]);

            foreach ($request->items as $item) {
                TransDetails::create([
                    'id_trans' => $transOrder->id,
                    'id_service' => $item['service_id'],
                    'qty' => $item['weight'], // Assuming 'qty' in TransDetails stores weight/quantity
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit(); // Commit the transaction

            return response()->json([
                'message' => 'Transaksi berhasil disimpan!',
                'transaction' => $transOrder,
                'receipt_url' => route('trans.printStruk', $transOrder->id) // Provide a URL for receipt
            ], 201); // 201 Created status
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback on error
            return response()->json(['message' => 'Gagal menyimpan transaksi: ' . $e->getMessage()], 500);
        }
    }

    public function snap(Request $request, $id)
    {
        $order = TransOrders::with('details', 'customer')->findOrFail($id);

        // Ensure unique order_id for Midtrans
        $midtransOrderId = 'MIDTRANS-' . $order->order_code . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => $order->total,
            ],
            'customer_details' => [
                'first_name' => $order->customer->name ?? 'Pelanggan Umum', // Fallback for general customers
                'email' => $order->customer->email ?? 'no-email@example.com',
                'phone' => $order->customer->phone ?? '000000000000',
                'address' => $order->customer->address ?? 'N/A',
            ],
            'callbacks' => [
                'finish' => route('trans.success'), // Define a success route for Midtrans callback
                'unfinish' => route('trans.unfinish'), // Define an unfinish route
                'error' => route('trans.error'), // Define an error route
            ]
        ];

        try {
            $snapToken = Snap::createTransaction($params)->token;
            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to get Midtrans Snap token: ' . $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,process,ready,delivered',
        ]);

        $transaction = TransOrders::findOrFail($id);
        $transaction->status = $request->status;
        $transaction->save();

        return response()->json(['message' => 'Status transaksi berhasil diperbarui!', 'transaction' => $transaction]);
    }

    // Midtrans callback routes
    public function midtransSuccess(Request $request)
    {
        // Handle successful payment from Midtrans
        // You might want to update the transaction status in your DB here
        return redirect()->route('trans.index')->with('status', 'Pembayaran berhasil!');
    }

    public function midtransUnfinish(Request $request)
    {
        // Handle unfinished payment
        return redirect()->route('trans.index')->with('status', 'Pembayaran belum selesai.');
    }

    public function midtransError(Request $request)
    {
        // Handle payment error
        return redirect()->route('trans.index')->with('status', 'Pembayaran gagal!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Detail Transaksi";
        $details = TransOrders::with(['customer', 'details.service'])->where('id', $id)->firstOrFail(); // Use firstOrFail for 404 if not found
        return view('trans.show', compact('title', 'details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implement if you need to edit a transaction
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement if you need to update a transaction (other than status)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = TransOrders::findOrFail($id);
        $transaction->details()->delete(); // Delete related transaction details
        $transaction->delete();
        return;
    }

    public function printStruk(string $id)
    {
        $details = TransOrders::with(['customer', 'details.service'])->where('id', $id)->firstOrFail();
        return view('trans.print', compact('details'));
    }
}
