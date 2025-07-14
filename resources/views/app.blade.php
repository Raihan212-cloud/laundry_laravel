<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('inc.css')
</head>

<body>


    <!-- ======= Header ======= -->
    @include('inc.header')


    <!-- ======= Sidebar ======= -->
    @include('inc.sidebar')

    <main id="main" class="main">
        @include('sweetalert::alert')

        <div class="pagetitle">
            <h1>Blank Page</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Blank</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="content">
            @yield('content')
        </div>



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('inc.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('inc.js')

    <script>
    // var, let, const
    // var : ketika nilainya tidak ada, maka tidak ada error
    // let : harus mempunyai nilai
    // const :isi nya tidak boleh berubah
    // const button = document.getElementById('addRow');
    // const button = document.getElementsByClassName('addRow');
    const button = document.querySelector('.addRow');
    const tbody = document.querySelector('#myTable tbody');
    const select = document.querySelector('#id_service');
    // button.textContent = "duar";
    // button.style.color = "red";
    const grandTotal = document.getElementById('grandTotal');
    const grandTotalInput = document.getElementById('grandTotalInput');

    const orderPay = document.getElementById('order_pay');
    const orderChange = document.getElementById('order_change');
    const orderChangeDisplay = document.getElementById('order_change_display');
    const totalInput = document.getElementById('totalInput');

    let no = 1;

    orderPay.addEventListener('input', updateOrderChange);

    button.addEventListener("click", function() {
        // alert('Duar');
        const selectedProduct = select.options[select.selectedIndex];
        const productValue = selectedProduct.value;
        if (!productValue) {
            alert('Pilih Produk Terlebih Dahulu');
            return;
        }
        const productName = selectedProduct.textContent;
        const productPrice = selectedProduct.dataset.price;
        const tr = document.createElement('tr'); //<tr></tr>
        tr.innerHTML = `
        <td>${no}</td>
        <td><input type='hidden' name='id_product[]' class='id_products' value='${select.value}'>${productName}</td>
        <td>
        <input type='number' name='qty[]' value='1' class='qtys'>
        <input type='hidden' class='priceInput' name='price[]' value='${productPrice}'>
        </td>
        <td><input type='hidden' name='total[]' class='totals' value='${productPrice}'><span class='totalText'>${productPrice}</span></td>
        <td><button class='btn btn-danger btn-sm removeRow' type='button'>Delete</button></td>`;

        tbody.appendChild(tr);
        updateGrandTotal();
        no++;
        select.value = "";


    });
    tbody.addEventListener('click', function(e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest("tr").remove();
        }
        updateNumber();
        updateGrandTotal();
    });

    tbody.addEventListener('input', function(e) {
        if (e.target.classList.contains('qtys')) {
            const row = e.target.closest("tr");
            const qty = parseFloat(e.target.value) || 0;
            // qty kg / 1000
            // const convertQty = parseFloat(qty / 1000) || 0;
            // console.log(convertQty);

            const price = parseInt(row.querySelector('[name="price[]"]').value);
            // const price = 10000

            row.querySelector('.totalText').textContent = price * qty;
            row.querySelector('.totals').value = price * qty;
            // e.target.closest("tr").remove();
            updateGrandTotal();
        }


    });

    function updateNumber() {
        const rows = tbody.querySelectorAll('tr');
        rows.forEach(function(row, index) {
            row.cells[0].textContent = index + 1;
        });

        no = rows.length + 1;
    }

    function updateGrandTotal() {
        const totalCells = tbody.querySelectorAll('.totals');
        let grand = 0;
        totalCells.forEach(function(input) {
            grand += parseInt(input.value) || 0;
        });
        grandTotal.textContent = grand.toLocaleString('id-ID');
        grandTotalInput.value = grand;
    }

    function updateOrderChange(){

        const pay = parseInt(orderPay.value) || 0;
        const total = parseInt(totalInput.value) || 0;
        const change = pay - total;

        orderChangeDisplay.value = change.toLocaleString('id-ID');
        orderChange.value = change;
    }


    </script>
    <script>
    // function updateOrderChange(){

    //     const pay = parseInt(orderPay.value) || 0;
    //     const total = parseInt(totalInput.value) || 0;
    //     const change = pay - total;

    //     orderChangeDisplay.value = change.toLocaleString('id-ID');
    //     orderChange.value = change;
    // }

    // orderPay.addEventListener('input', updateOrderChange);
    </script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>


    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form submit biasa

            const form = e.target;
            const method = form.querySelector('[name="payment_method"]:checked, [name="payment_method"]:focus')
                ?.value;

            const data = {
                order_pay: document.getElementById('order_pay').value,
                order_change: document.getElementById('order_change').value,
                payment_method: method,
                _token: '{{ csrf_token() }}'
            };

            const orderId = form.dataset.orderId;

            if (method === 'cash') {
                //submit biasa untuk pembayaran cash
                form.submit();
            } else {
                //kirim ke route laravel untuk generate snap token
                fetch(`/trans/${orderId}/snap`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': data._token
                    },
                    body: JSON.stringify(data)

                })
            .then(res => res.json())
                .then(res => {
                    if (res.token) {
                        snap.pay(res.token, {
                            onSuccess: function(result) {
                                window.location.href = trans;
                            },
                            onPending: function(result) {
                                alert("Silahkan selesaikan pembayaran Anda.");
                            },
                            onError: function(result) {
                                alert("gagal.");
                            }
                        });
                    } else {
                        alert("Gagal ambil token pembayaran.");
                    }
                });
        }
        });
    </script>

</body>

</html>
