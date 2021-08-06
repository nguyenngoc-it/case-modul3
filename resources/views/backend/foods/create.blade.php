@extends('backend.master')
@section('title', 'Thêm mới đồ ăn')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Thêm mới đồ ăn</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('home.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <select name="address" id="">
                                @foreach($categories as $category)

                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>



                                <label for="">Price</label>
                                <input type="text" class="form-control" name="price" required>
                                <div class="form-group">
                                    <label for="">Sale price</label>
                                    <input type="text" class="form-control" name="sale-price" required>
                                    <div class="form-group">
                                        <label for="">Incurred </label>
                                        <input type="text"class="form-control" name="incurred" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
