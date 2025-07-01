@extends('app')
@section('content')
    <div class="row">
        <div class="col-12">
            <di class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        {{ $title }}
                    </h3>
                    <form action="{{ route('service.update', $edit->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="" class="form-lable">Service Name</label>
                        <input type="text" class="form-control" name="service_name" value="{{ $edit->service_name }}">

                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $edit->price }}" required>

                        <label for="" class="form-label">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5">{{ $edit->description }}</textarea>

                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-2">Back</a>
                    </form>
                </div>
            </di>
        </div>
    </div>
@endsection
