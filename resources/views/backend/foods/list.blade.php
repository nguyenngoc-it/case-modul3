@extends('backend.master')
@section('title', 'Danh Sach Foods')
@section('content')
    <h1 class="mt-4">Foods Manager</h1>
    <ol class="breadcrumb mb-4">
        <form method="get" action="{{route('home.create')}}">
            <button type="submit">Add Food</button>
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
                    <th scope="col">Address</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale_Price</th>
                    <th scope="col">Incurred</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($foods) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($foods as $key => $food)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $food->name }}</td>
                            <td>
                                @if($food->image)
                                    <img src="{{ asset('storage/'.$food->image) }}" alt="" style="width: 100px; height: 100px">
                                @else
                                    <img src="public/storage/imgs/p9fO19BK4hqqtZO2dVDDOEHPdGTjxS58HbsHDFTH.png" alt="" style="width: 100px; height: 100px">
                                @endif
                            </td>
                            <td>{{ $food->address }}</td>
                            <td>{{ $food->start_time }}</td>
                            <td>{{ $food->end_time }}</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->sale_price }}</td>
                            <td>{{ $food->incurred}}</td>
                            <td><a class="btn btn-primary" href="{{route('home.edit', $food->id)}}">sửa</a></td>
                            <td><a class="btn btn-danger" href="{{route('home.delete', $food->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
