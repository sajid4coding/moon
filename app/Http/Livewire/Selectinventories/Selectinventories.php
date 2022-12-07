<?php

namespace App\Http\Livewire\Selectinventories;

use Livewire\Component;
use App\Models\{Cart, Color, Size, Inventory, Product};
use Carbon\Carbon;
use Illuminate\Http\Request;

class Selectinventories extends Component
{
    public $selectsize;
    public $selectcolor;
    public $product_id;
    public $colors;
    public $stock = 0;
    public $total_price = 0;
    public $unit_price = 0;
    public $count = 1;
    public $card_button_visibility = 'd-none';
    public $size_button_visibility = TRUE;
    public $inventory;
    public $available_inventory;


    public function addtocartbtn(){
        if($this->available_inventory = Inventory::where('product_id', $this->product_id)->exists()){
            if(
                Cart::where([
                    'user_id' => auth()->id(),
                    'vendor_id' => $this->inventory->vendor_id,
                    'product_id' => $this->product_id,
                    'size_id' => $this->inventory->size_id,
                    'color_id' => $this->inventory->color_id
                ])->exists()
            ){
                Cart::where([
                    'user_id' => auth()->id(),
                    'vendor_id' => $this->inventory->vendor_id,
                    'product_id' => $this->product_id,
                    'size_id' => $this->inventory->size_id,
                    'color_id' => $this->inventory->color_id
                ])->increment('quantity', $this->count);
            }else{
                Cart::insert([
                    'user_id' => auth()->id(),
                    'vendor_id' => $this->inventory->vendor_id,
                    'product_id' => $this->product_id,
                    'size_id' => $this->inventory->size_id,
                    'color_id' => $this->inventory->color_id,
                    'quantity' => $this->count,
                    'created_at' => Carbon::now()
                ]);
            }
        }else{
            Cart::insert([
                'user_id' => auth()->id(),
                'vendor_id' => $this->inventory->vendor_id,
                'product_id' => $this->product_id,
                'quantity' => $this->count,
                'created_at' => Carbon::now()
            ]);
            $this->card_button_visibility = '';
        }

        $this->card_button_visibility = 'd-none';

        session()->flash('addtocartmessage', 'Product Add to Cart Page');
    }
    public function increment(){
        if($this->count < $this->stock){
            $this->count++;
            $this->unit_price = $this->total_price*$this->count;
        }
    }

    public function decrement(){
        if($this->count > 1){
            $this->count--;
            $this->unit_price = $this->total_price*$this->count;
        }
    }

    public function updatedSelectsize($id){
        $this->stock = 0;

        $this->colors = Inventory::where([
            'product_id' => $this->product_id,
            'size_id' => $id
        ])->get();

        $this->card_button_visibility = 'd-none';
    }



    public function updatedSelectcolor($id){
        $this->inventory = Inventory::find($id);

        $this->stock = Inventory::find($id)->quantity;

        if($this->total_price = Product::find(Inventory::find($id)->product_id)->discount_price){
            $this->total_price = Product::find(Inventory::find($id)->product_id)->discount_price;
        }else{
            $this->total_price = Product::find(Inventory::find($id)->product_id)->regular_price;
        }

        $this->card_button_visibility = '';
    }

    public function render()
    {
        if(!$this->available_inventory = Inventory::where('product_id', $this->product_id)->exists()){
            $this->card_button_visibility = '';
            $this->size_button_visibility = FALSE;
        }
        return view('livewire.selectinventories.selectinventories' ,[
            'selectinventories' => Inventory::select('size_id')->where('product_id', $this->product_id)->groupBy('size_id')->get(),
        ]);
    }
}
