@extends('layouts/dashboardmaster')

@section('content')
<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vendor_list') }}">Vendor List</a></li>
            </ol>
        </div>

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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($admins->where('role', 'Vendor') as $admin)
                                <tr class="@if ($loop->odd)
                                    table-active
                                @endif">
                                    <td scope="row">{{ $loop->index + 1}}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->number }}</td>
                                    <td>{{ $admin->created_at->diffForhumans() }}</td>
                                    <td>{{ $admin->role }}</td>
                                    <td>

                                        <style>
                                            .switch2 {
                                            position: relative;
                                            display: inline-block;
                                            width: 60px;
                                            height: 34px;
                                            margin: 16px;
                                            }
                                            .switch2 input{
                                            opacity: 0;
                                            width: 0;
                                            height: 0;
                                            }
                                            .slider2{
                                            position: absolute;
                                            top: 0;
                                            bottom: 0;
                                            left: 0;
                                            right: 0;
                                            background-color: #272727;
                                            box-shadow: inset 2px 3px 2px rgba(0, 0, 0, 0.2), inset -2px -3px 2px rgba(255, 255, 255, 0.1);
                                            cursor: pointer;
                                            border-radius: 34px;
                                            transition: 0.4s;
                                            }
                                            .slider2::before{
                                            content:'';
                                            position: absolute;
                                            left: 4px;
                                            bottom: 4px;
                                            height: 26px;
                                            width: 26px;
                                            background-color: #707070;
                                            box-shadow: inset 2px 3px 2px rgba(255, 255, 255, 0.1), inset -2px -3px 2px rgba(0, 0, 0, 0.2), 2px 3px 2px rgba(0, 0, 0, 0.2);
                                            border-radius: 50%;
                                            transition: 0.4s;
                                            }
                                            input:checked + .slider2{
                                            background-color: #77fb6b;
                                            }
                                            input:checked + .slider2::before{
                                            transform: translatex(25px);
                                            background-color: #dedede;
                                            }
                                        </style>

                                        <form action="{{ route('vendor_status', $admin->id)}}" method="POST">
                                            @csrf
                                            <label class="switch2">
                                                <input onChange="this.form.submit()" @if ($admin->status == 1) checked @endif type="checkbox" name='switch'>
                                                <span class="slider2"></span>
                                            </label>
                                        </form>

                                    </td>
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
