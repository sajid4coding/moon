@extends('layouts/dashboardmaster')

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin_list') }}">Admin List</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered display min-w850">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Created At</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins->where('role', 'Admin') as $admin)
                                <tr class="@if ($loop->odd)
                                    table-active
                                @endif">
                                    <td scope="row">{{ $loop->index + 1}}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->number }}</td>
                                    <td>{{ $admin->created_at->diffForhumans() }}</td>
                                    <td>{{ $admin->role }}</td>
                                </tr>
                            @empty
                                <tr class="text-danger text-center">
                                    <td colspan="50">NO DATA HERE</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="{{ asset('dashboard_asset') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection


