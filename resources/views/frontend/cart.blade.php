@extends('frontend.master')
@section('content')
    <div class="cart_wrapper">
        @csrf
        @include('frontend.compoments.cart_compoment')
    </div>

@endsection
