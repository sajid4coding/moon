@extends('layouts.dashboardmaster')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="#">Add Attributes</a> {<a href="#attributes_name">Attributes Name</a>, <a href="#color">Colors</a> }</li>
    </ol>
</div>

    <div class="row">
        <div class="col-sm-12">
            @livewire('attributes.attributes')
        </div>
    </div>
@endsection

