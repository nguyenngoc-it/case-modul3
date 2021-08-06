@extends('backend.master')
@section('title', 'sua danh muc')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Edit category</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input value="{{$category->name}}" type="text" class="form-control" name="name" required>
                        </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input value="{{$category->image}}" type="file" class="form-control" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
