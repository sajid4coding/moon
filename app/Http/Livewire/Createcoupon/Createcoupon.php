<?php

namespace App\Http\Livewire\Createcoupon;

use App\Models\Coupon;
use Livewire\Component;

class Createcoupon extends Component
{
    public $coupon_name;
    public $minimum_purchase;
    public $coupon_type;
    public $discount;

    public function render()
    {
        return view('livewire.createcoupon.createcoupon',[
            'coupons' => Coupon::where('vendor_id', auth()->id())->get(),
        ]);
    }

    public function create_coupon(){
        $this->validate([
            'coupon_name' => 'required',
            'minimum_purchase' => 'required',
            'coupon_type' => 'required',
            'discount' => 'required'
        ]);

        if(
            Coupon::where([
                'vendor_id' => auth()->id(),
                'coupon_name' => $this->coupon_name,
            ])->exists()
        ){
            session()->flash('coupon_exists', 'Coupon Already Taken.');
        }else{
            Coupon::insert([
                'vendor_id' => auth()->id(),
                'coupon_name' => $this->coupon_name,
                'minimum_purchase' => $this->minimum_purchase,
                'coupon_type' => $this->coupon_type,
                'discount' => $this->discount,
                'created_at' => now()
            ]);
            $this->reset(['coupon_name','minimum_purchase', 'coupon_type', 'discount']);
            session()->flash('coupon_created', 'Coupon Created.');
        }

    }

    public function delete_coupon($id){
        Coupon::findOrFail($id)->delete();
    }
}
