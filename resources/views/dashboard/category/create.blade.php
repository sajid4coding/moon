@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Category Add</h4>
            </div>
            <div class="card-body">
                <div class="basic-form p-3">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Category Name</span>
                            </div>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name='category_name'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Category Slug</span>
                            </div>
                            <input type="text" class="form-control" name='category_slug'>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="form-control custom-file-input @error('category_image') is-invalid @enderror" name='category_image'>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-md">Category Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

