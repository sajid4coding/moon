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
                    <tbody>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $category->category_name }}</td>
                        </tr>
                        <tr>
                            <th>Category Slug</th>
                            <td>{{ $category->category_slug }}</td>
                        </tr>
                        <tr>
                            <th>Category Image</th>
                            <td><img width="50" src="{{ asset('uploads/category_image') }}/{{ $category->category_image }}" alt="Not Found"></td>
                        </tr>
                        <tr>
                            <th>Category Created At</th>
                            <td>{{ $category->created_at }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection



