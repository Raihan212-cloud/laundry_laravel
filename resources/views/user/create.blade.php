@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <di class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $title }}
                    </h3>
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <label for="" class="form-lable">Nama *</label>
                        <input type="text" class="form-control" name="name" required>

                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">

                        <label for="" class="form-label">Password</label>
                        <input name="password" class="form-control" name="password"></input>

                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Kembali</a>
                    </form>
                </div>
            </di>
        </div>
    </div>
@endsection
