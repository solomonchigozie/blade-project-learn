<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //query scope
    public function scopeRange($query){
        return $query->whereBetween('price',[100, 200]);
    }
}
