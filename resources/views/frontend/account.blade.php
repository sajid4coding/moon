@extends('layouts.frontendmaster')

@section('content')
 <!-- breadcrumb_section - start
            ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
            <!-- breadcrumb_section - end
            ================================================== -->

            <!-- account_section - start
            ================================================== -->
            <section class="account_section section_space">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 account_menu">
                            <div class="nav account_menu_list flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link text-start active w-100" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Account Dashboard </button>
                                <button class="nav-link text-start w-100" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Acount</button>
                                <button class="nav-link text-start w-100" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">My Orders</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link text-start w-100" type="submit">Log Out</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content bg-light p-3" id="v-pills-tabContent">
                                <div class="tab-pane fade show active text-center" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h5>Welcome to Account</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <canvas id="myChart" width="150" height="150"></canvas>
                                        </div>
                                        <div class="col-6">
                                            <canvas id="myChart1" width="150" height="150"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h5 class="text-center pb-3">Account Details</h5>
                                    <form class="row g-3 p-2">
                                        <div class="col-md-6">
                                            <label for="inputnamel4" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputnamel4" value="Mr. Jon Doe">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail4" value="jon@doe.com">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputPassword4" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="inputPassword4">
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary active">Update</button>
                                        </div>
                                     </form>
                                    </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                    <h5 class="text-center pb-3">Your Orders</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Order No</th>
                                            <th>Billing Address</th>
                                            <th>Delivery Charge</th>
                                            <th>Total</th>
                                            <th>Payment</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Action</th>
                                        </tr>@foreach ($invoices as $invoice)

                                            <tr>
                                                <td>#{{ $invoice->id }}</td>
                                                <td>{{ $invoice->billing_address }}</td>
                                                <td>{{ $invoice->delivery_change }}</td>
                                                <td>{{ $invoice->total_price }}</td>
                                                <td>{{ $invoice->payment }}</td>
                                                <td>{{ $invoice->payment_method }}</td>
                                                <td>{{ $invoice->payment_status }}</td>
                                                <td>
                                                    <a href="{{ route('invoice', $invoice->id) }}" class="btn btn-primary">Invoice</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
    <!-- account_section - end
    ================================================== -->
@endsection

@section('footer_script')
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['COD', 'Online Payment'],
            datasets: [{
                label: '# of Votes',
                data: [{{ $unpaid_order }}, {{ $paid_order }}],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'Which payment method you used'
        }
        }
    },
    });
    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const myChart1 = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Unpaid Money', 'Paid Money'],
            datasets: [{
                label: '# of Votes',
                data: [{{ $unpaid_order_total_price }}, {{ $paid_order_total_price }}],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: 'How much you spent'
        }
        }
    },
    });
    </script>
@endsection
