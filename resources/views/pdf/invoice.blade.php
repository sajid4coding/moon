<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font family start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet"> --}}

    <!-- font family end -->
    <title>Paypal</title>

</head>
<body  style="font-family: 'Poppins', sans-serif;margin: 0;padding: 0;">
  <div class="container_box" style="width: 720px; background:#ffffff;padding: 50px 50px; margin: 0 auto;margin-top: 50px;border: 1px solid #b6b6b6;">



<!-- top part -->
   <div style="display: flex; justify-content:space-between;">

       <div style="margin-right: auto;">
              <img src="https://sslcommerz.com/wp-content/uploads/2019/11/footer_logo.png" alt="paypal.png" width="120px" >
            <h1>{{ env('APP_NAME') }}</h1>

           <h4 style="font-size: 20px;color:#3d3d3d;">{{ $invoice->billing_first_name }}</h4>
           <p style="margin-top:-20px;font-size: 14px; color: #202020;">{{ $invoice->billing_address }}</p>

           <p style="font-size: 14px; color: #202020;">
            <span style="display: block;">Phone: {{ $invoice->billing_phone }}</span>
            {{ $invoice->billing_email }}
            </p>
       </div>
       <div style="margin-left: auto;">
           <h6 style="text-align: right;font-size:26px;color:#868686;margin: 0 ;margin-bottom: 40px;font-weight: 600;">INVOICE</h6>
           <p><span style="width: 160px;display: inline-block;background:#bbdefc83;color: #646464;padding: 2px 10px;margin-right: 10px; font-weight: 600;">Invoice Number </span> 0001</p>
           <p><span style="width: 160px;display: inline-block;background:#bbdefc83;color: #646464;padding: 2px 10px;margin-right: 10px; font-weight: 600;">Invoice Date </span> {{ $invoice->created_at }}</p>
           <p><span style="width: 160px;display: inline-block;background:#bbdefc83;color: #646464;padding: 2px 10px;margin-right: 10px; font-weight: 600;">Payment Method </span> {{ $invoice->payment_method }}</p>

       </div>

   </div>
<!-- top part end-->

<!-- center part -->
<div>
    <h4 style="color: #3d3d3d;">Bill to</h4>
    <p  style="margin-top:-20px; font-size: 16px; color: #3d3d3d; margin-bottom: 15px;">{{ $invoice->billing_email }}</p>
</div>

<!-- top part end-->


<!-- bottom part start-->
<p style="display: flex;justify-content:space-between; background:#bbdefc83;font-weight: 700;color: #3d3d3d;width: 100%;"><span style="width: 45%;text-align: left;">Description </span><span style="width: 20%;text-align: right;">Quantity </span><span style="width: 25%;text-align: right;">Unit Price </span><span style="width: 25%; text-align: right;"> Amount </span></p>
<p style="display: flex;justify-content:space-between; border-bottom: 1px solid #d3d3d3;padding-bottom: 15px;margin-top: 0;"><span style="width: 45%;text-align: left;">Test Product </span><span style="width: 20%;text-align: right;">1 </span><span style="width: 25%;text-align: right;">$215.00 </span><span style="width: 25%; text-align: right;"> $215.00</span></p>

<p style="display: flex;justify-content:space-between; margin: 0 !important; font-weight: 700;color: #3d3d3d;width: 100%;"><span style="width: 48%;text-align: left;">Note to recipient(s) </span><span style="width: 28%;text-align: left;">Subtotal </span><span style="width: 25%;text-align: right;"> $215.00 </span></p>
<p style="display: flex;justify-content:space-between; border-bottom: 1px solid #d3d3d3; padding-bottom: 15px;margin-top: 0;"><span style="width: 48%;text-align: left;">Thanks for your busines</span><span style="width: 29%;text-align: left;font-weight: 500;">Tax(8.6%) </span><span style="width: 25%;text-align: right;"> $18.49</span></p>




<div class="total" style="display: flex; justify-content: end;margin-left: auto; background:#bbdefc83;">
    <h4 style="margin: 0 !important; color: #3d3d3d;width: 57%; text-align: right;">Total</h4>
    <h4 style="margin: 0 !important; color: #3d3d3d;width: 44%; text-align: right;">$232.49</h4>
</div>

<!-- bottom part end-->



  </div>
  <p style="text-align: center;font-size:14px;color:#575757; width: 700px;margin: 30px auto; font-weight: 600;">If you have any question releted to your recent purchase then call us now to cancel this order on
  our given toll free number <span style="color: #4f62b3;">+189337389</span> our customer support executive will asisst you.</p>

  <div style="text-align: center; margin: 0 auto; width: 100%;">
    <button style="font-size: 16px;padding: 8px 20px !important;background: #0098fd;border: none;color: #ffffff;cursor: pointer;margin-right: 20px;">Pay Invoice</button>
    <button style="font-size: 16px;padding: 8px 40px !important;background: #646464;border: none;color: #ffffff;cursor: pointer;">Print</button>
</div>

  <p style="text-align: center;font-size:16px;color:#868686;margin-top: 55px;">Copyright&copy; 1999-2016 PayPal. All rights reserved.</p>

</body>
</html>
