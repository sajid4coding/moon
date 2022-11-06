<div>
    {{-- THIS IS FOR ADD SIZE START--}}
    <div class="row align-items-center" id="attributes_name">
        <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <span>Add Attributes Name</span>
            </div>
            <div class="card-body">
                @if (session()->has('size-insert-message'))
                    <div class="alert alert-success">
                        {{ session('size-insert-message') }}
                    </div>
                @endif
                <form wire:submit.prevent="addsize">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('size') is-invalid @enderror" placeholder="Add Attributes Name" wire:model="size">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-md item-certer">Add Attributes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <span>Add Attributes List</span>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sizes as $size)
                                <tr>
                                    <td>{{ $size->size }}</td>
                                <td>
                                    <a wire:click="delete_size({{ $size->id }})" class="btn btn-outline-danger btn-md item-certer">Delete</a>
                                </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="50" class="text-center">No Size Added Yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- THIS IS FOR ADD SIZE END--}}









    {{-- THIS IS FOR ADD COLOR START--}}
    <div class="row align-items-center" id="color">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <span>Add Color</span>
                </div>
                <div class="card-body">
                    @if (session()->has('color-insert-message'))
                        <div class="alert alert-success">
                            {{ session('color-insert-message') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="addcolor">
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <div class="form-group row align-items-center">
                                    <label class="col-sm-4 col-form-label">Color Name</label>
                                    <div class="col-sm-8 mb-3">
                                        <input type="text" class="@error('color') is-invalid @enderror form-control" wire:model="color_name">
                                    </div>
                                    <label class="col-sm-4 col-form-label">Color</label>
                                    <div class="col-sm-8 mb-3">
                                        <input type="color" class="@error('color') is-invalid @enderror" wire:model="color">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-primary btn-md item-certer">Add Color</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <span>Add Color List</span>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Color Name</th>
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($colors as $color)
                                    <tr>
                                        <td>{{ $color->color_name }}</td>
                                        <td><input type="color" value="{{ $color->color }}"></td>
                                        <td>
                                            <a wire:click="delete_color({{ $color->id }})" class="btn btn-outline-danger btn-md item-certer">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center">No Color Added Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- THIS IS FOR ADD COLOR END--}}
</div>
