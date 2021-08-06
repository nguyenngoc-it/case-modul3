@extends('backend.master')
@section('title', 'Thêm mới danh muc')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Thêm mới danh muc</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
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
