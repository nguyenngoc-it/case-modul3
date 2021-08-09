@extends('frontend.master')
@section('content')
    <div class="cart_wrapper">
        @csrf
        <form action="" method="post">
            <div class="form-group">
                <label >Name Customer</label>
                <input type="text" class="form-control"   placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" class="form-control"   placeholder="Enter Address">
            </div>
            <div class="form-group">
                <label >Phone Number</label>
                <input type="number" class="form-control"   placeholder="Enter Phone Number">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
