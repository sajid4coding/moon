<?php

namespace App\Http\Livewire\Cartshow;

use Livewire\Component;
use App\Models\{Cart, Shipping};
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Cartshow extends Component
{
    public $coupon;
    public $shipping_id = 0;
    public $calculate_shipping;
    public $coupon_error;

    public function render()
    {
        return view('livewire.cartshow.cartshow',[
            'carts' => Cart::where('user_id', auth()->id())->get(),
            'shippings' => Shipping::all()
        ]);
    }

    public function cart_row_delete($id){
        Cart::find($id)->delete();
        return back();
    }

    public function decrement($id){
        Cart::find($id)->decrement('quantity');
    }

    public function increment($id){
        Cart::find($id)->increment('quantity');
    }

    public function quantity_input($id, $quantity){
        // $quantity = 1;
        if($quantity){
            Cart::find($id)->update([
                'quantity' => $quantity
            ]);
        }
    }
    public function apply_coupon($subtotal, $vendor_id){
        if($this->coupon){
            $get_coupon_info = Coupon::where('coupon_name', $this->coupon)->first();
            if(Coupon::where('coupon_name', $this->coupon)->exists()){
                $coupon_vendor_id = Coupon::where('coupon_name', $this->coupon)->first()->vendor_id;
                if($coupon_vendor_id == $vendor_id){
                    if(Coupon::where('coupon_name', $this->coupon)->first()->minimum_purchase <= $subtotal){
                        session(['coupon_info' => $get_coupon_info]);
                    }else{
                        $minimum_purchase = Coupon::where('coupon_name', $this->coupon)->first()->minimum_purchase;
                        $this->coupon_error = "Coupon Minimum Purchase shortage: ".($minimum_purchase - $subtotal);
                        session(['coupon_info' => '']);
                    }
                }else{
                    $this->coupon_error = 'This Product Vendor Coupon ID Invalid';
                    session(['coupon_info' => '']);
                }
            }else{
                $this->coupon_error = 'Coupon does not exists.';
                session(['coupon_info' => '']);
            }
        }else{
            $this->coupon_error = 'Put your Coupon.';
            session(['coupon_info' => '']);
        }
    }

    public function updatedCalculateShipping($id){
        $this->shipping_id = $id;
        if($id == 0){
            session(['shipping_charge' => 0]);
        }else{
            session(['shipping_charge' => Shipping::find($this->shipping_id)->shipping_charge]);
        }
    }
}
