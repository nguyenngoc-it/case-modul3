@extends('backend.master')
@section('title', 'Danh Sach Foods')
@section('content')
    <h1 class="mt-4">Foods Manager</h1>
    <ol class="breadcrumb mb-4">

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
                    <th scope="col">Category</th>
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
                            <td>@if(isset($store)){{$store->address}}@endif</td>
                            <td>@if(isset($food->category)){{$food->category->name}}@endif</td>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->sale_price }}</td>
                            <td>{{ $food->incurred}}</td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
