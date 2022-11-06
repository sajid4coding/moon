<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    function relationwithproduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    
    function relationwithsize(){
        return $this->hasOne(Size::class, 'id', 'size_id');
    }

    function relationwithcolor(){
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
