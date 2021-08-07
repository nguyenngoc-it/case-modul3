@extends('backend.master')
@section('title', 'Danh Sach Foods')
@section('content')
    <h1 class="mt-4">Foods Manager</h1>
    <ol class="breadcrumb mb-4">
        <form method="get" action="{{route('store.create')}}">
            <button type="submit">Create Store</button>
        </form>
    </ol>
    <div class="col-12">
        <div class="row">
            <div class="col-12">
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>

                </tr>
                </thead>
                <tbody>

                @foreach($stores as $store)
                    <tr>
                        <td>{{$store->name}}</td>
                        <td>{{$store->address}}</td>
                        <td><a class="btn btn-primary" href="{{route('store.edit', $store->id)}}">Edit</a></td>
                        <td><a class="btn btn-primary" href="{{route('store.delete', $store->id)}}">Delete</a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
