@extends('layouts.dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="3">Add Product</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Add New Product</h4>
            </div>
            <div class="card-body">
                <div class="basic-form p-3">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Product Name</span>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name='name'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            {{-- <div class="input-group-prepend">
                                <span class="input-group-text">Category</span>
                            </div> --}}
                            <label for="category_id"> Category </label>
                            <select id="category_id" class="form-control js-example-basic-single @error('name') is-invalid @enderror" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Purchase Price</span>
                            </div>
                            <input type="number" class="form-control @error('purchase_price') is-invalid @enderror" name='purchase_price'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Regular Price</span>
                            </div>
                            <input type="number" class="form-control @error('regular_price') is-invalid @enderror" name='regular_price'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Discount Price</span>
                            </div>
                            <input type="number" class="form-control @error('discount_price') is-invalid @enderror" name='discount_price'>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Short Description</span>
                            </div>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="4"></textarea>
                        </div>
                        <div class="input-group input-group-md mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Description</span>
                            </div>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6"></textarea>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="form-control custom-file-input @error('thumbnail') is-invalid @enderror" name='thumbnail'>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-primary btn-md">Add New Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: "Select Category",
            allowClear: true
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@endsection
