@extends('layouts.dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="3">Add Inventory</a></li>
    </ol>
</div>
{{-- THIS IS FOR ADD SIZE START--}}
<div class="card">
    <div class="card-header">
        <span> <b>{{ $product->name }}</b> Add Inventory</span>
    </div>
    <div class="card-body">
        @livewire('inventory.inventories', ['product_id'=> $product->id])
    </div>
</div>
{{-- THIS IS FOR ADD SIZE END--}}
@endsection
