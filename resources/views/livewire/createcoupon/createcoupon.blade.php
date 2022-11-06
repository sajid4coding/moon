<div>
    <div class="row align-items-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <span>Create Coupon</span>
                </div>
                <div class="card-body">
                    @if (session()->has('coupon_created'))
                        <div class="alert alert-success">
                            {{ session('coupon_created') }}
                        </div>
                    @endif
                    @if (session()->has('coupon_exists'))
                        <div class="alert alert-danger">
                            {{ session('coupon_exists') }}
                        </div>
                    @endif
                    <form wire:submit.prevent="create_coupon">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('coupon_name') is-invalid @enderror" placeholder="Coupon Name" wire:model="coupon_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control @error('minimum_purchase') is-invalid @enderror" placeholder="Minimum Purchase" wire:model="minimum_purchase">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select wire:model="coupon_type" class="form-control @error('coupon_type') is-invalid @enderror">
                                            <option selected>Select Coupon Type</option>
                                            <option value="Flat">Flat Discount</option>
                                            <option value="Parcentage">Parcentage Discount (%)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control @error('discount') is-invalid @enderror" placeholder="Discount" wire:model="discount">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-md item-certer">Create Coupon</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <span>Coupon List</span>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-responsive table table-hover ">
                            <thead>
                                <tr>
                                    <th>Coupon Name</th>
                                    <th>Minimum Purchase</th>
                                    <th>Coupon Type</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                    <tr>
                                        <td>
                                            {{ $coupon->coupon_name }}
                                        </td>
                                        <td>
                                            {{ $coupon->minimum_purchase }}
                                        </td>
                                        <td>
                                            {{ $coupon->coupon_type }}
                                        </td>
                                        <td>
                                            {{ $coupon->discount }}
                                        </td>
                                        <td>
                                            {{-- <a wire:click="delete_coupon({{ $coupon->id }})" class="btn btn-outline-danger btn-md item-certer"> Delete </a> --}}
                                            <button wire:click="delete_coupon({{ $coupon->id }})" class="btn btn-danger shadow btn-xs sharp mr-1 delete" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="50" class="text-center text-danger">No Coupon Created Yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
