@extends('layout')
@section('content')


<h1>Thanks for Order</h1>
<h2>You Choosed Handcash</h2>
<h3>Pay Your Bill to Dalivary Man</h3>
 <a class="btn btn-default check_out" href="{{URL::to('/user-order')}}">Your Order</a>
@endsection