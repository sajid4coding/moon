<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\{Team, Product, Cart, Color, Inventory, Invoice, Invoice_Detail, orders};
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Library\SslCommerz\SslCommerzNotification;
use DB;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use Khsing\World\Models\Country;
use Barryvdh\DomPDF\Facade\Pdf;

class FrontendController extends Controller
{
    function register(){
        return view('auth.register');
    }

    public function index()
    {
        return view('frontend.index',[
            'categories' => Category::all(),
            // 'products' => Product::all(),
            'products' => Product::limit(6)->latest()->get(),
            'latest_products' => Product::latest()->get(),
            'carts' => Cart::where('user_id', auth()->id())->get()
        ]);
    }
    public function shop()
    {
        return view('frontend.shop',[
            'products' => Product::latest()->get(),
            'colors' => Color::all(),
        ]);
    }

    public function contact()
        {
            return view('frontend.contact');
        }

    public function contact_message(Request $request)
        {
            Mail::to($request->email)->send(new ContactMessage($request->except('_token')));
            return back();
        }

    public function account()
    {
        return view('frontend.account', [
            'invoices' => Invoice::where('user_id', auth()->id())->get(),
            'unpaid_order' => Invoice::where('user_id', auth()->id())->where('payment', 'Unpaid')->count(),
            'unpaid_order_total_price' => Invoice::where('user_id', auth()->id())->where('payment', 'Unpaid')->sum('total_price'),
            'paid_order' => Invoice::where('user_id', auth()->id())->where('payment', 'Paid')->count(),
            'paid_order_total_price' => Invoice::where('user_id', auth()->id())->where('payment', 'Paid')->sum('total_price'),
        ]);
    }
    public function invoice($id)
    {
        $invoice = Invoice::find($id);
        $pdf = Pdf::loadView('pdf.invoice',compact('invoice'))->setPaper('a4', 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    function team(){
        $teamsdata = Team::paginate(5);
        $trashed = Team::onlyTrashed()->get();
        $count = Team::count();
        return view('team', compact('teamsdata','count','trashed'));
    }


    function teaminsert(request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required'
        ],[
            'name.required' => 'The Name Field is Required',
            'number.required' => 'The Number Field is Required'
        ]);
        Team::insert([
            'name' => $request->name,
            'number' => $request->number,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success message', 'Team Data Insert Successfully.');
    }


    function teamdelete($id){
        if($id == "all"){
            Team::where('deleted_at', NULL)->delete();
            return back()->with('All Data Deleted', 'Team All Data Deleted.');
        }else{
            Team::find($id)->delete();
            return back()->with('delete message', 'Team Data Deleted.');
        }
    }
    function teamedit($id, request $request){
        Team::find($id)->update([
            'name' => $request->Name,
            'number' => $request->Number
        ]);
        return back();
    }
    function teamtrash($id){
        Team::onlyTrashed()->where('id', $id)->restore();
        return back();
    }
    function teamtrashdelete($id){
        Team::onlyTrashed()->where('id', $id)->delete();
        return back();
    }




    //product single page
    public function single_page($id){
        $single_product = Product::findOrFail($id);
        $category_id = $single_product->category_id;
        $products = product::where('category_id', $single_product->category_id)->where('id','!=',$id)->limit(4)->get();
        return view('frontend.product_single_page',compact('single_product','products','category_id'));
    }


    //Cart Page

    public function cart(){
        return view('frontend.cart.cart');
    }

    public function checkout(){
        $explode_cart = explode('/', url()->previous());
        $cart_page = end($explode_cart);

        if($cart_page == 'cart'){
            return view('frontend.checkout.checkout',[
                'countries' => World::Countries(),
            ]);
        }else{
            return abort(404);
        }
    }

    public function get_city(Request $request){
        // return $request;
        $cities = World::getByCode($request->country_code);
        $countries_cities = $cities->children();
        $sort_name = collect($countries_cities);
        $countries_cities_alpha = $sort_name->sortBy('name');
        $get_countries_city = "";
        foreach($countries_cities_alpha as $city){
            $get_countries_city .= "<option value='$city->id'>$city->name</option>";
        }
        return $get_countries_city;
    }

    public function payment_post(Request $request){
        $country_name = Country::getByCode($request->billing_country_code);
        session('country_name', $country_name->name);
        session('billing_first_name', $request->billing_first_name);
        session('billing_email', $request->billing_email);
        session('billing_address', $request->billing_address);
        session('billing_phone', $request->billing_phone);

        if(session('coupon_info')){
            $invoice_id = Invoice::insertGetId([
                "user_id" => auth()->id(),
                "vendor_id" => Cart::where('user_id',auth()->id())->first()->vendor_id,
                "billing_first_name" => $request->billing_first_name,
                "billing_email" => $request->billing_email,
                "billing_company" => $request->billing_company,
                "billing_phone" => $request->billing_phone,
                "billing_country_code" => $request->billing_country_code,
                "billing_country_id" => $request->billing_country_id,
                "billing_address" => $request->billing_address,
                "order_comments" => $request->order_comments,
                "coupon_discount" => session('coupon_info')->discount,
                "after_coupon_discount" => session('after_discount'),
                "delivery_change" => session('shipping_charge'),
                "total_price" => session('total'),
                "payment_method" => $request->payment_method,
                "created_at" => now()
            ]);

        }else{
            $invoice_id = Invoice::insertGetId([
                "user_id" => auth()->id(),
                "vendor_id" => Cart::where('user_id',auth()->id())->first()->vendor_id,
                "billing_first_name" => $request->billing_first_name,
                "billing_email" => $request->billing_email,
                "billing_company" => $request->billing_company,
                "billing_phone" => $request->billing_phone,
                "billing_country_code" => $request->billing_country_code,
                "billing_country_id" => $request->billing_country_id,
                "billing_address" => $request->billing_address,
                "order_comments" => $request->order_comments,
                "delivery_change" => session('shipping_charge'),
                "total_price" => session('total'),
                "payment_method" => $request->payment_method,
                "created_at" => now()
            ]);
        }

        foreach(Cart::where('user_id', auth()->id())->get() as $invoice_detail){
            // if(Product::find($invoice_detail->product_id)->discount_price){
            //     $unit_price = Product::find($invoice_detail->product_id)->discount_price;
            // }else{
            //     $unit_price = Product::find($invoice_detail->product_id)->regular_price;
            // }

            Invoice_Detail::insert([
                "invoice_id" => $invoice_id,
                "user_id" => $invoice_detail->user_id,
                "vendor_id" => $invoice_detail->vendor_id,
                "product_id" => $invoice_detail->product_id,
                "size_id" => $invoice_detail->size_id,
                "color_id" => $invoice_detail->color_id,
                "quantity" => $invoice_detail->quantity,
                "total_price" => session('total'),
                "created_at" => now()
            ]);
        }

        if(Inventory::where([
            'product_id' => $invoice_detail->product_id,
            'size_id' =>  $invoice_detail->size_id,
            'color_id' => $invoice_detail->color_id
        ])->exists()){
            Inventory::where([
                'product_id' => $invoice_detail->product_id,
                'size_id' =>  $invoice_detail->size_id,
                'color_id' => $invoice_detail->color_id
            ])->decrement('quantity', $invoice_detail->quantity);
        }

        if($request->payment_method == "COD"){
            Cart::where('user_id', auth()->id())->delete();
            return redirect('cart');
        }else{
            return redirect('pay')->with('invoice_id', $invoice_id);

        }

        Cart::where('user_id', auth()->id())->delete();
        return redirect('account');


    }

    public function cart_row_delete($id){
        Cart::find($id)->delete();
        return redirect('/');
    }
}
