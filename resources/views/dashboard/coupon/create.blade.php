@extends('layouts.dashboardmaster')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="#">Create Coupon</a></li>
    </ol>
</div>

@livewire('createcoupon.createcoupon')

@endsection
