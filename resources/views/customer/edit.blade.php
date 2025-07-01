@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <di class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $title }}
                    </h3>
                    <form action="{{ route('customer.update', $edit->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="" class="form-lable"> Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $edit->name }}">

                        <label for="" class="form-label">Telp</label>
                        <input type="number" class="form-control" name="phone" value="{{ $edit->phone }}" required>

                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" cols="30" rows="5">{{ $edit->alamat }}</textarea>

                        <button type="submit" class="btn btn-primary mt-2">Simpan perubahan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Kembali</a>
                    </form>
                </div>
            </di>
        </div>
    </div>
@endsection
