@extends('backend.master')
@section('title', 'Edit Store')

@section('content')
<div class="container">
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Edit Store</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('store.update', $store->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input value="{{$store->name}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input value="{{$store->address}}" type="text" class="form-control" name="address" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
