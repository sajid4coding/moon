<div>
    @if (session()->has('Inventory-Message'))
        <div class="alert alert-success">
            {{ session('Inventory-Message') }}
        </div>
    @endif
    <form wire:submit.prevent="inventory" >
        @csrf
        <div class="row align-items-center">
            <div class="col-sm-12 mb-5">
                <div class="form-group row">
                    <select wire:model="size" id="" class="form-control">
                        <option selected>Select Attributes</option>
                        @foreach ($product_sizes as $product_size)
                            <option value="{{ $product_size->id }}">{{ $product_size->size }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <select wire:model="color" id="" class="form-control">
                        <option selected>Select Attributes Color</option>
                        @foreach ($product_colors as $product_color)
                            <option value="{{ $product_color->id }}">{{ $product_color->color_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <input type="number" class="form-control" placeholder="Quantity" wire:model="quantity">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary btn-md item-certer">Add Inventory</button>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product_inventories as $product_inventory)
                            <tr>
                                <td>{{ $product_inventory->relationwithsize->size }}</td>
                                <td><input disabled type="color" value="{{ $product_inventory->relationwithcolor->color }}">{{ $product_inventory->relationwithcolor->color_name }}</td>
                                <td>{{ $product_inventory->quantity }}</td>
                                <td><a class="btn btn-danger shadow btn-xs sharp mr-1" wire:click="delete_inventory({{ $product_inventory->id }})" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="50" class="text-center">No Inventories Added Yet This Product</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
