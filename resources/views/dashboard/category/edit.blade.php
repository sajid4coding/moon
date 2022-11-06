@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header">
                <b>Category Details</b>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <tbody>
                            <tr>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Category Name</span>
                                    </div>
                                    <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
                                </div>
                            </tr>
                            <tr>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Category Slug</span>
                                    </div>
                                    <input type="text" class="form-control" name="category_slug" value="{{ $category->category_slug }}">
                                </div>
                            </tr>
                            <tr>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Category Image</span>
                                    </div>
                                    <img width="50" src="{{ asset('uploads/category_image') }}/{{ $category->category_image }}" alt="Not Found" name="category_image">
                                </div>
                            </tr>
                            <tr>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control custom-file-input @error('category_image') is-invalid @enderror" name='category_image'>
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                        <button type="submit" class="btn btn-outline-warning px-5">Update</button>
                    </form>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection







