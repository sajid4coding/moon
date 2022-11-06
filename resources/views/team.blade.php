@extends('layouts/master')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header">
                    This is Team Member Information
                </div>
                <div class="card-body">
                    <form action="{{ url('team/insert') }}" method="POST">
                        @csrf
                        @if (session('success message'))
                            <div class="alert alert-primary" role="alert">
                                <strong>{{ session('success message') }}</strong>
                            </div>
                        @endif
                        @if (session('delete message'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('delete message') }}</strong>
                            </div>
                        @endif
                        @if (session('All Data Deleted'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('All Data Deleted') }}</strong>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif




                        <div>
                            <label for="name" class=""> Name </label>
                            <input type="text" class="@if (old('name')) is-valid @endif form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger mb-3">{{ $message }}</small> <br>
                            @enderror

                            <label for="name" class="mt-3"> Number </label>
                            <input type="tel" class="@if (old('number')) is-valid @endif form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}">
                            @error('number')
                                <small class="text-danger mb-3">{{ $message }}</small> <br>
                            @enderror

                            <button class="btn btn-primary mt-3"> Add Member </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col-8 m-auto">
            <div class="card">
                <div class="card-header">
                    Team Member List
                    @if (!$count == 0)
                        <span class="badge bg-primary">Total : {{ $count }}</span>
                        <span class="badge bg-secondary">Total This Page : {{ $teamsdata->count() }}</span>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Trash
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Trash</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trashed as $trash)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $trash->name }}</td>
                                            <td>{{ $trash->number }}</td>
                                            <td><a href="{{ url('team/trash') }}/{{ $trash->id }}" class="btn btn-info btn-sm">Restore</a>
                                                <a href="{{ url('team/trash/delete') }}/{{ $trash->id }}" class="btn btn-danger btn-sm"> Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Number</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamsdata as $teamdata)
                                <tr class="@if ($loop->odd)
                                    table-active
                                @endif">
                                    <td scope="row">{{ $teamsdata->firstitem() + $loop->index}}</td>
                                    <td>{{ $teamdata->name }}</td>
                                    <td>{{ $teamdata->number }}</td>
                                    <td>{{ $teamdata->created_at->diffForhumans() }}</td>
                                    <td><a href="{{ url('team/delete') }}/{{ $teamdata->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        <!-- Button trigger modal -->
                                        <a href="{{ url('team/edit') }}/{{ $teamdata->id }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $teamdata->id }}">
                                            Edit
                                        </a>
                                    </td>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $teamdata->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Member Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ url('team/edit') }}/{{ $teamdata->id }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">

                                                            <label for="Name" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="Name" id="Name" aria-describedby="helpId" value="{{ $teamdata->name }}">

                                                            <label for="Number" class="form-label mt-3">Phone Number</label>
                                                            <input type="tel" class="form-control" name="Number" id="Number" aria-describedby="helpId" value="{{ $teamdata->number }}">

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </tr>
                            @endforeach
                                @if ($teamsdata->count() == 0)
                                    <tr class="text-danger text-center">
                                        <td colspan="50">NO DATA HERE</td>
                                    </tr>
                                @endif
                        </tbody>
                    </table>
                    <a href="{{ url('team/delete') }}/all" class="btn btn-warning btn-sm">TRUNCATE</a>
                    <br>
                    <br>
                    <br>
                    {{ $teamsdata->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>
@endsection


