@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col-lg-12">

        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('add_admin') }}">Add Users</a></li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Add New Admin</h4>
            </div>
            <div class="card-body">
                <div class="basic-form p-3">
                    <form action="{{ route('add_admin_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">New Admin Name</span>
                            </div>
                            <input type="text" class="form-control @error('new_admin_name') is-invalid @enderror" name='new_admin_name'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">New Admin Email</span>
                            </div>
                            <input type="email" class="form-control @error('new_admin_name') is-invalid @enderror" name='new_admin_email'>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-primary btn-md item-certer">Add New Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

