@extends('layouts.dashboardmaster')

@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="3">Product List</a></li>
    </ol>
</div>

@if (auth()->user()->role == 'Admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>Vendor ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->vendor_id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->relationwithcategory->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger shadow btn-xs sharp mr-1 delete" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <button class="btn btn-warning shadow btn-xs sharp" type="button" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa-solid fa-layer-group"></i></button>

                                                <!-- Trash Modal Start-->
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Products Trash List</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table id="example4" class="display min-w450">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Thumbnail</th>
                                                                                <th>Product Name</th>
                                                                                <th>Category</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           @foreach ($trash_products as $trash_product)
                                                                             <tr>
                                                                                 <td>
                                                                                     @if ($trash_product->thumbnail)
                                                                                         <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/{{ $trash_product->thumbnail }}" alt="">
                                                                                     @else
                                                                                         <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/noimage.jfif" alt="">
                                                                                     @endif
                                                                                 </td>
                                                                                 <td>{{ $trash_product->name }}</td>
                                                                                 <td>{{ $trash_product->relationwithcategory->category_name }}</td>
                                                                                 <td>
                                                                                     <form action="{{ route('product.update', $trash_product->id) }}" method="POST">
                                                                                         @csrf
                                                                                         @method('PUT')
                                                                                         <button class="btn btn-danger shadow btn-xs sharp restore" type="submit"><i class="fa-sharp fa-solid fa-rotate-left"></i></button>
                                                                                     </form>
                                                                                 </td>
                                                                             </tr>
                                                                           @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- Trash Modal End-->

                                            </div>
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
@endif

@if (auth()->user()->role == 'Vendor')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (session('restore_message'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ session('restore_message') }}
                                  </div>
                                @endif
                                @foreach ($products->where('vendor_id', auth()->id()) as $product)
                                    <tr>
                                        <td>
                                            @if ($product->thumbnail)
                                                <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/{{ $product->thumbnail }}" alt="">
                                            @else
                                                <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/noimage.jfif" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->relationwithcategory->category_name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('product.inventory', $product->id) }}" class="btn btn-info shadow btn-xs sharp mr-1" data-toggle="tooltip" title="Add Inventory"><i class="fa-sharp fa-solid fa-ellipsis-vertical"></i></a>
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger shadow btn-xs sharp mr-1 delete" type="submit" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <button class="btn btn-warning shadow btn-xs sharp" type="button" data-toggle="modal" data-target=".bd-example-modal-lg" data-toggle="tooltip" title="Trash"><i class="fa-solid fa-layer-group"></i></button>

                                                <!-- Trash Modal Start-->
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Products Trash List</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table id="example4" class="display min-w450">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Thumbnail</th>
                                                                                <th>Product Name</th>
                                                                                <th>Category</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           @foreach ($trash_products->where('vendor_id', auth()->user()->id) as $trash_product)
                                                                             <tr>
                                                                                 <td>
                                                                                     @if ($trash_product->thumbnail)
                                                                                         <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/{{ $trash_product->thumbnail }}" alt="">
                                                                                     @else
                                                                                         <img class="rounded" width="35" src="{{ asset('uploads') }}/product_thumbnail/noimage.jfif" alt="">
                                                                                     @endif
                                                                                 </td>
                                                                                 <td>{{ $trash_product->name }}</td>
                                                                                 <td>{{ $product->relationwithcategory->category_name }}</td>
                                                                                 <td>
                                                                                     <form action="{{ route('product.update', $trash_product->id) }}" method="POST">
                                                                                         @csrf
                                                                                         @method('PUT')
                                                                                         <button class="btn btn-danger shadow btn-xs sharp" type="submit"><i class="fa-sharp fa-solid fa-rotate-left"></i></button>
                                                                                     </form>
                                                                                 </td>
                                                                             </tr>
                                                                           @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <!-- Trash Modal End-->
                                            </div>
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
@endif


@endsection


@section('footer_script')
<script src="{{ asset('dashboard_asset') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example3').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#example4').DataTable();
        });
    </script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('product_added'))
        <script>
            Swal.fire({
            position: 'center-center',
            icon: 'success',
            title: "{{ session('product_added') }}",
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        @endif

    @if (session('delete_message'))
    <script>
        // After Restore Alert Message Start
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: "{{ session('delete_message') }}"
            })
        // After Restore Alert Message End
    </script>
    @endif

    @if (session('restore_message'))
        <script>
            // After Restore Alert Message Start
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: "{{ session('restore_message') }}"
                })
            // After Restore Alert Message End
        </script>
    @endif
@endsection



