@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card">
            <div class="card-header">
                <b>Category</b>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                            {{-- <th>Category Slug</th>
                            <th>Category Image</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-rounded btn-outline-info px-5">Details</a>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-rounded btn-outline-warning px-5">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-rounded btn-outline-danger px-5" type="submit">Delete</button>
                                    </form>
                                </td>
                                {{-- <td>{{ $category->category_slug }}</td>
                                <td><img width="50" src="{{ asset('uploads/category_image') }}/{{ $category->category_image }}" alt="Not Found"></td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan=50 class="text-danger text-center">
                                    No Category Added Yet
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection

