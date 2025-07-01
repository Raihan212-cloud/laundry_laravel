@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <di class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $title }}
                    </h3>
                    <form action="{{ route('customer.store') }}" method="post">
                        @csrf
                        <label for="" class="form-lable">Nama *</label>
                        <input type="text" class="form-control" name="name" required>

                        <label for="" class="form-label">Telp</label>
                        <input type="number" class="form-control" name="phone">

                        <label for="" class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" cols="30" rows="5"></textarea>

                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Kembali</a>
                    </form>
                </div>
            </di>
        </div>
    </div>
@endsection
