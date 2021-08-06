@extends('backend.master')
@section('title', 'Danh Sach Category')
@section('content')
    <h1 class="mt-4">Category Manager</h1>
    <ol class="breadcrumb mb-4">
        <form method="get" action="{{route('category.create')}}">
            <button type="submit">Add Category</button>
        </form>
    </ol>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($categories) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($categories as $key => $category)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/'.$category->image) }}" alt="" style="width: 100px; height: 100px">
                                @else
                                    <img src="public/storage/imgs/p9fO19BK4hqqtZO2dVDDOEHPdGTjxS58HbsHDFTH.png" alt="" style="width: 100px; height: 100px">
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{route('category.edit',$category->id)}}">sửa</a></td>
                            <td><a class="btn btn-danger" href="{{route('category.delete',$category->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
