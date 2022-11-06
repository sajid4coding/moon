<?php

namespace App\Http\Livewire\Attributes;

use Livewire\Component;
use App\Models\{Color, Size};
use Carbon\Carbon;
use Illuminate\Http\Request;

class Attributes extends Component
{
    public function render()
    {
        $sizes = Size::where('user_id',auth()->id())->latest()->get();
        $colors = Color::where('user_id',auth()->id())->latest()->get();
        return view('livewire.attributes.attributes',compact('sizes','colors'));
    }

    public $size;
    public function addsize(Request $request)
    {
        // $request->validate([
        //     'size' => 'required'
        // ]);

        Size::insert([
            'size' => $this->size,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now()
        ]);

        $this->reset('size');

        session()->flash('size-insert-message', 'Size Added Successfully.');
    }

    public function delete_size($id)
    {
        Size::find($id)->delete();
    }


    public $color_name;
    public $color;
    public function addcolor(Request $request)
    {
        // $request->validate([
        //     'color' => 'required'
        // ]);

        Color::insert([
            'color_name' => $this->color_name,
            'color' => $this->color,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now()
        ]);

        $this->reset('color', 'color_name');

        session()->flash('color-insert-message', 'Color Added Successfully.');
    }

    public function delete_color($id)
    {
        Color::find($id)->delete();
    }
}
