@extends('backend.master')
@section('title', 'sua do an')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Edit food</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('home.update', $food->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input value="{{$food->name}}" type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">

                            <div class="form-group">
                                <label for="">Price</label>
                                <input value="{{$food->price}}"type="text" class="form-control" name="price" required>
                                <div class="form-group">
                                    <label for="">Sale price</label>
                                    <input value="{{$food->sale_price}}" type="text" class="form-control" name="sale-price" required>
                                    <label for="">Discount Code</label>
                                    <input value="{{$food->discount_count}}" type="text" class="form-control" name="discount-code" >
                                    <div class="form-group">
                                        <label for="">Incurred </label>
                                        <input value="{{$food->incurred}}" type="text"class="form-control" name="incurred" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input value="{{$food->image}}" type="file" class="form-control" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
