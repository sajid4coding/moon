@extends('layouts.dashboardmaster')

@section('content')

<!--**********************************
    Content body start
***********************************-->
<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            @if (auth()->user()->role == 'Admin')
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-success mr-md-4 mr-3">
                                    <i class="fa-2x fa-solid fa-user"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Users</p>
                                    <span class="title text-black font-w600">{{ $users->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-success" style="width: {{ $users->count() }}%; height:5px;" role="progressbar">
                                    <span class="sr-only">{{ $users->count() }}% Users</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-success"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-primary  mr-md-4 mr-3">
                                    {{-- <svg width="40" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.64826 26.5285C0.547125 26.7394 -0.174308 27.8026 0.0366371 28.9038C0.222269 29.8741 1.07449 30.5491 2.02796 30.5491C2.15453 30.5491 2.28531 30.5364 2.41188 30.5112L10.7653 28.908C11.242 28.8152 11.6682 28.5578 11.9719 28.1781L15.558 23.6554L14.3599 23.0437C13.4739 22.5965 12.8579 21.7865 12.6469 20.8035L9.26338 25.0688L1.64826 26.5285Z" fill="#A02CFA"/>
                                        <path d="M31.3999 8.89345C33.8558 8.89345 35.8467 6.90258 35.8467 4.44673C35.8467 1.99087 33.8558 0 31.3999 0C28.9441 0 26.9532 1.99087 26.9532 4.44673C26.9532 6.90258 28.9441 8.89345 31.3999 8.89345Z" fill="#A02CFA"/>
                                        <path d="M21.6965 3.33297C21.2282 2.85202 20.7937 2.66217 20.3169 2.66217C20.1439 2.66217 19.971 2.68748 19.7853 2.72967L12.1534 4.53958C11.0986 4.78849 10.4489 5.84744 10.6979 6.89795C10.913 7.80079 11.7146 8.40831 12.6048 8.40831C12.7567 8.40831 12.9086 8.39144 13.0605 8.35347L19.5618 6.81357C19.9837 7.28187 22.0974 9.57273 22.4813 9.97775C19.7938 12.855 17.1064 15.7281 14.4189 18.6054C14.3767 18.6519 14.3388 18.6982 14.3008 18.7446C13.5161 19.7445 13.7566 21.3139 14.9379 21.9088L23.1774 26.1151L18.8994 33.0467C18.313 34.0002 18.6083 35.249 19.5618 35.8396C19.8951 36.0464 20.2621 36.1434 20.6249 36.1434C21.3042 36.1434 21.9707 35.8017 22.3547 35.1815L27.7886 26.3766C28.0882 25.8915 28.1683 25.305 28.0122 24.7608C27.8561 24.2123 27.4806 23.7567 26.9702 23.4993L21.3885 20.66L27.2571 14.3823L31.6869 18.1371C32.0539 18.4493 32.5054 18.6012 32.9526 18.6012C33.4335 18.6012 33.9145 18.424 34.2899 18.078L39.3737 13.3402C40.1669 12.6019 40.2133 11.3615 39.475 10.5684C39.0868 10.1549 38.5637 9.944 38.0406 9.944C37.5638 9.944 37.0829 10.117 36.7074 10.4671L32.9019 14.0068C32.8977 14.011 23.363 5.04163 21.6965 3.33297Z" fill="#A02CFA"/>
                                    </svg> --}}
                                    <i class="fa-2x fa-solid fa-users"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Pending Vendor</p>
                                    <span class="title text-black font-w600">{{ $users->where('role','Vendor')->where('status', False)->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-primary" style="width: {{ $users->where('role','Vendor')->count() }}%; height:5px;" role="progressbar">
                                    <span class="sr-only">{{ $users->where('role','Vendor')->count() }} Total Vendor</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-primary"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                    {{-- <svg width="40" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.64826 26.5285C0.547125 26.7394 -0.174308 27.8026 0.0366371 28.9038C0.222269 29.8741 1.07449 30.5491 2.02796 30.5491C2.15453 30.5491 2.28531 30.5364 2.41188 30.5112L10.7653 28.908C11.242 28.8152 11.6682 28.5578 11.9719 28.1781L15.558 23.6554L14.3599 23.0437C13.4739 22.5965 12.8579 21.7865 12.6469 20.8035L9.26338 25.0688L1.64826 26.5285Z" fill="#A02CFA"/>
                                        <path d="M31.3999 8.89345C33.8558 8.89345 35.8467 6.90258 35.8467 4.44673C35.8467 1.99087 33.8558 0 31.3999 0C28.9441 0 26.9532 1.99087 26.9532 4.44673C26.9532 6.90258 28.9441 8.89345 31.3999 8.89345Z" fill="#A02CFA"/>
                                        <path d="M21.6965 3.33297C21.2282 2.85202 20.7937 2.66217 20.3169 2.66217C20.1439 2.66217 19.971 2.68748 19.7853 2.72967L12.1534 4.53958C11.0986 4.78849 10.4489 5.84744 10.6979 6.89795C10.913 7.80079 11.7146 8.40831 12.6048 8.40831C12.7567 8.40831 12.9086 8.39144 13.0605 8.35347L19.5618 6.81357C19.9837 7.28187 22.0974 9.57273 22.4813 9.97775C19.7938 12.855 17.1064 15.7281 14.4189 18.6054C14.3767 18.6519 14.3388 18.6982 14.3008 18.7446C13.5161 19.7445 13.7566 21.3139 14.9379 21.9088L23.1774 26.1151L18.8994 33.0467C18.313 34.0002 18.6083 35.249 19.5618 35.8396C19.8951 36.0464 20.2621 36.1434 20.6249 36.1434C21.3042 36.1434 21.9707 35.8017 22.3547 35.1815L27.7886 26.3766C28.0882 25.8915 28.1683 25.305 28.0122 24.7608C27.8561 24.2123 27.4806 23.7567 26.9702 23.4993L21.3885 20.66L27.2571 14.3823L31.6869 18.1371C32.0539 18.4493 32.5054 18.6012 32.9526 18.6012C33.4335 18.6012 33.9145 18.424 34.2899 18.078L39.3737 13.3402C40.1669 12.6019 40.2133 11.3615 39.475 10.5684C39.0868 10.1549 38.5637 9.944 38.0406 9.944C37.5638 9.944 37.0829 10.117 36.7074 10.4671L32.9019 14.0068C32.8977 14.011 23.363 5.04163 21.6965 3.33297Z" fill="#A02CFA"/>
                                    </svg> --}}
                                    <i class="fa-2x fa-solid fa-users"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Approval Vendor</p>
                                    <span class="title text-black font-w600">{{ $users->where('role','Vendor')->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-secondary" style="width: {{ $users->where('role','Vendor')->count() }}%; height:5px;" role="progressbar">
                                    <span class="sr-only">{{ $users->where('role','Vendor')->count() }} Total Vendor</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-secondary"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                    {{-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
                                        <path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
                                        <path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
                                        <path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
                                    </svg> --}}
                                    <i class="fa-2x fa-solid fa-user-group"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Customer</p>
                                    <span class="title text-black font-w600">{{ $users->where('role','Customer')->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-danger" style="width: 90%; height:5px;" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-danger"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-info  mr-md-4 mr-3">
                                    {{-- <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9996 10.0001C22.7611 10.0001 24.9997 7.76148 24.9997 5.00004C24.9997 2.23859 22.7611 0 19.9996 0C17.2382 0 14.9996 2.23859 14.9996 5.00004C14.9996 7.76148 17.2382 10.0001 19.9996 10.0001Z" fill="#FFBC11"/>
                                        <path d="M29.7178 36.3838L23.5603 38.6931L26.6224 39.8414C27.9402 40.3307 29.3621 39.6527 29.8413 38.3778C30.0964 37.6976 30.021 36.9851 29.7178 36.3838Z" fill="#FFBC11"/>
                                        <path d="M8.37771 27.6588C7.08745 27.1803 5.64452 27.8298 5.15873 29.1224C4.67411 30.4151 5.32967 31.8555 6.62228 32.3413L9.31945 33.3527L16.4402 30.6821L8.37771 27.6588Z" fill="#FFBC11"/>
                                        <path d="M34.8413 29.1225C34.3554 27.8297 32.9126 27.1803 31.6223 27.6589L11.6223 35.1589C10.3295 35.6448 9.67401 37.0852 10.1586 38.3779C10.6378 39.6524 12.0594 40.3309 13.3776 39.8415L33.3777 32.3414C34.6705 31.8556 35.326 30.4152 34.8413 29.1225Z" fill="#FFBC11"/>
                                        <path d="M37.5001 20.0001H31.5455L27.2364 11.3819C26.7886 10.4871 25.8776 9.97737 24.9388 10.0001L19.9996 10.0001L15.061 10.0001C14.1223 9.97737 13.2125 10.4872 12.7637 11.3819L8.45457 20.0001H2.49998C1.1194 20.0001 0 21.1195 0 22.5001C0 23.8807 1.1194 25.0001 2.49998 25.0001H10C10.9473 25.0001 11.8128 24.4654 12.2363 23.6183L15 18.0909V27.4724L19.9998 29.3472L25 27.4719V18.0909L27.7637 23.6183C28.1873 24.4655 29.0528 25.0001 30 25.0001H37.5C38.8806 25.0001 40 23.8807 40 22.5001C40 21.1195 38.8807 20.0001 37.5001 20.0001Z" fill="#FFBC11"/>
                                    </svg> --}}
                                    <i class="fa-2x fa-brands fa-product-hunt"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Products</p>
                                    <span class="title text-black font-w600">{{ $products->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-info" style="width: 42%; height:5px;" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-info"></div>
                    </div>
                </div>
            @endif
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                {{-- <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9996 10.0001C22.7611 10.0001 24.9997 7.76148 24.9997 5.00004C24.9997 2.23859 22.7611 0 19.9996 0C17.2382 0 14.9996 2.23859 14.9996 5.00004C14.9996 7.76148 17.2382 10.0001 19.9996 10.0001Z" fill="#FFBC11"/>
                                    <path d="M29.7178 36.3838L23.5603 38.6931L26.6224 39.8414C27.9402 40.3307 29.3621 39.6527 29.8413 38.3778C30.0964 37.6976 30.021 36.9851 29.7178 36.3838Z" fill="#FFBC11"/>
                                    <path d="M8.37771 27.6588C7.08745 27.1803 5.64452 27.8298 5.15873 29.1224C4.67411 30.4151 5.32967 31.8555 6.62228 32.3413L9.31945 33.3527L16.4402 30.6821L8.37771 27.6588Z" fill="#FFBC11"/>
                                    <path d="M34.8413 29.1225C34.3554 27.8297 32.9126 27.1803 31.6223 27.6589L11.6223 35.1589C10.3295 35.6448 9.67401 37.0852 10.1586 38.3779C10.6378 39.6524 12.0594 40.3309 13.3776 39.8415L33.3777 32.3414C34.6705 31.8556 35.326 30.4152 34.8413 29.1225Z" fill="#FFBC11"/>
                                    <path d="M37.5001 20.0001H31.5455L27.2364 11.3819C26.7886 10.4871 25.8776 9.97737 24.9388 10.0001L19.9996 10.0001L15.061 10.0001C14.1223 9.97737 13.2125 10.4872 12.7637 11.3819L8.45457 20.0001H2.49998C1.1194 20.0001 0 21.1195 0 22.5001C0 23.8807 1.1194 25.0001 2.49998 25.0001H10C10.9473 25.0001 11.8128 24.4654 12.2363 23.6183L15 18.0909V27.4724L19.9998 29.3472L25 27.4719V18.0909L27.7637 23.6183C28.1873 24.4655 29.0528 25.0001 30 25.0001H37.5C38.8806 25.0001 40 23.8807 40 22.5001C40 21.1195 38.8807 20.0001 37.5001 20.0001Z" fill="#FFBC11"/>
                                </svg> --}}
                                <i class="fa-2x fa-solid fa-list-ul"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Categories</p>
                                <span class="title text-black font-w600">{{ $categories->count() }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: {{ $categories->count() }}%; height:5px;" role="progressbar">
                                <span class="sr-only">{{ $categories->count() }} Categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning"></div>
                </div>
            </div>
            @if (auth()->user()->role == 'Vendor')
                <div class="col-sm-6">
                    <div class="card avtivity-card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span class="activity-icon bgl-info  mr-md-4 mr-3">
                                    {{-- <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.9996 10.0001C22.7611 10.0001 24.9997 7.76148 24.9997 5.00004C24.9997 2.23859 22.7611 0 19.9996 0C17.2382 0 14.9996 2.23859 14.9996 5.00004C14.9996 7.76148 17.2382 10.0001 19.9996 10.0001Z" fill="#FFBC11"/>
                                        <path d="M29.7178 36.3838L23.5603 38.6931L26.6224 39.8414C27.9402 40.3307 29.3621 39.6527 29.8413 38.3778C30.0964 37.6976 30.021 36.9851 29.7178 36.3838Z" fill="#FFBC11"/>
                                        <path d="M8.37771 27.6588C7.08745 27.1803 5.64452 27.8298 5.15873 29.1224C4.67411 30.4151 5.32967 31.8555 6.62228 32.3413L9.31945 33.3527L16.4402 30.6821L8.37771 27.6588Z" fill="#FFBC11"/>
                                        <path d="M34.8413 29.1225C34.3554 27.8297 32.9126 27.1803 31.6223 27.6589L11.6223 35.1589C10.3295 35.6448 9.67401 37.0852 10.1586 38.3779C10.6378 39.6524 12.0594 40.3309 13.3776 39.8415L33.3777 32.3414C34.6705 31.8556 35.326 30.4152 34.8413 29.1225Z" fill="#FFBC11"/>
                                        <path d="M37.5001 20.0001H31.5455L27.2364 11.3819C26.7886 10.4871 25.8776 9.97737 24.9388 10.0001L19.9996 10.0001L15.061 10.0001C14.1223 9.97737 13.2125 10.4872 12.7637 11.3819L8.45457 20.0001H2.49998C1.1194 20.0001 0 21.1195 0 22.5001C0 23.8807 1.1194 25.0001 2.49998 25.0001H10C10.9473 25.0001 11.8128 24.4654 12.2363 23.6183L15 18.0909V27.4724L19.9998 29.3472L25 27.4719V18.0909L27.7637 23.6183C28.1873 24.4655 29.0528 25.0001 30 25.0001H37.5C38.8806 25.0001 40 23.8807 40 22.5001C40 21.1195 38.8807 20.0001 37.5001 20.0001Z" fill="#FFBC11"/>
                                    </svg> --}}
                                    <i class="fa-2x fa-brands fa-product-hunt"></i>
                                </span>
                                <div class="media-body">
                                    <p class="fs-14 mb-2">Total Products</p>
                                    <span class="title text-black font-w600">{{ $products->where('vendor_id', auth()->id())->count() }}</span>
                                </div>
                            </div>
                            <div class="progress" style="height:5px;">
                                <div class="progress-bar bg-info" style="width: 42%; height:5px;" role="progressbar">
                                    <span class="sr-only">42% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="effect bg-info"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->

@endsection


