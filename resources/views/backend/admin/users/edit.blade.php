@extends('backend.master')
@section('title', 'Edit Users')

@section('content')
    <div class="container">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Edit users</h1>
                </div>
                <div class="col-12">
                    <form method="post" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input value="{{$user->username}}" type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input value="{{$user->email}}" type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input value="{{$user->password}}" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <select  name="role" id="password-confirm"  class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
