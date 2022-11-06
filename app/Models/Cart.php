<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['quantity'];

    public function relationshipwithproduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function relationshipwithsize(){
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
    public function relationshipwithcolor(){
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
    public function relationshipwithuser(){
        return $this->hasOne(User::class, 'id', 'vendor_id');
    }
}
