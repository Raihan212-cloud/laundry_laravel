<?php

namespace App\Http\Controllers;

use App\Models\Count;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('aritmatika');
    }

    public function tambah()
    {
        $title = "Tambah-tambahan";
        $jumlah = 0;
        $error = null;
        return view('tambah', compact('title', 'jumlah', 'error'));
        // return view('tambah', [$title, $jumlah]);
    }

    public function tambahAction(Request $request)
    {
        $request->validate(
            [
                'angka1' => 'required',
                'angka2' => 'required'
            ]
        );
        // $_POST
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $error = null;
        $jumlah = null;

        if (!is_numeric($angka1) || !is_numeric($angka2)) {
            $error = "Data Harus Numeric";
        } else {
            $jumlah = $angka1  + $angka2;
        }

        // INSERT INTO counts (jenis, angka1, angka2, hasil) VALUES ()
        if ($error == null) {
            Count::create([
                'jenis' => $request->jenis,
                'angka1' => $angka1,
                'angka2' => $angka2,
                'hasil' => $jumlah
            ]);
        }

        // return redirect()->route('')->with('status', "Berhasil Simpan");
        return view('tambah', compact('jumlah', 'error'));
    }

    public function viewHitungan()
    {
        //SELECT * FROM counts;
        $counts = Count::all();

        return view('data-hitungan', compact('counts'));
    }

    public function editDataHitung(string $id)
    {
        $title = null;
        $error = null;
        $jumlah = null;

        //SELECT * FROM counts WHERE id = $id
        $count = Count::findOrFail($id);
        $jenis = $count->jenis;

        if ($jenis == "tambah") {
            $title = "Edit Penambahan";
            if (!is_numeric($count->angka1) || !is_numeric($count->angka2)) {
                $error = "Inputan Harus Numeric";
            } else {
                $jumlah = $count->angka1 + $count->angka2;
            }
            return view('tambah.edit', compact('title', 'error', 'jumlah', 'count'));
        }
    }

    public function updateTambahan(Request $request, string $id)
    {

        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $count = $angka1 + $angka2;


        //SELECT * FROM counts WHERE id = $id
        //Update FROM counts SET ........... WHERE id = $id
        $data = Count::findOrFail($id);
        $data->jenis = $request->jenis;
        $data->angka1 = $angka1;
        $data->angka2 = $angka2;
        $data->hasil = $count;
        $data->save();

        return redirect()->route('edit.data-hitung', $id)->with(['status' => 'Data Berhasil di Update']);
        // Count::Update([
        //     'jenis' => $request->jenis,
        //     'angka1' => $request->angka1,
        // ]);
    }
    public function softDeleteTambahan(string $id)
    {
        //SELECT * FROM counts WHERE id = $id
        $sDel = Count::findOrFail($id);
        //DELETE FROM counts WHERE id = $id
        $sDel->delete();

        return redirect()->route('data.hitungan')->with('status', 'Data Dihapus Sementara');
    }

    public function update($name)
    {
        return "Selamat datang $name";
    }

    public function nuall()
    {
        return "Nuall";
    }
}
