<?php

namespace App\Http\Livewire\Inventory;

use Livewire\Component;
use App\Models\{Color, Size, Inventory, User};
use Carbon\Carbon;
use Illuminate\Http\Request;

class Inventories extends Component
{
    public $product_id;

    public function render()
    {
        return view('livewire.inventory.inventories',[
            'product_sizes' => Size::all(),
            'product_colors' => Color::all(),
            'product_inventories' => Inventory::where('product_id', $this->product_id)->get()
        ]);
    }
    public $size;
    public $color;
    public $quantity;
    public $inventory_exist;


    public function inventory(Request $request)
    {
        $inventory_exist = Inventory::where([
            'vendor_id' => auth()->id(),
            'product_id' => $this->product_id,
            'size_id' => $this->size,
            'color_id' => $this->color
        ])->first();

        if($inventory_exist){
            $inventory_exist->increment('quantity', $this->quantity);
            $inventory_exist->save();
        }else{
            Inventory::insert([
                'vendor_id' => auth()->id(),
                'product_id' => $this->product_id,
                'size_id' => $this->size,
                'color_id' => $this->color,
                'quantity' => $this->quantity,
                'created_at' => Carbon::now()
            ]);
        }

        $this->reset('size','color','quantity');

        session()->flash('Inventory-Message', 'Inventories Successfully Updated.');
    }

    public function delete_inventory($id){
        Inventory::find($id)->delete();
    }
}
