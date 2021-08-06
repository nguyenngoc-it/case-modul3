@extends('backend.master')
@section('title', 'List Users')
@section('content')
    <h1 class="mt-4">List Users</h1>
    <ol class="breadcrumb mb-4">
        <form method="get" action="{{route('user.create')}}">
            <button type="submit">Add Users</button>
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

                @foreach($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
