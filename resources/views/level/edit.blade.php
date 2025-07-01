@extends('app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $title }}</h3>

                    <form action="{{ route('level.update', $level->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Nama Level *</label>
                            <input value="{{ $level->name }}" type="text"
                            placeholder="Masukkan Nama Level"
                                class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
