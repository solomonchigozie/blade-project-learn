<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCustom extends Model
{
    use HasFactory;


    protected $fillable = [
        'title','post'
    ];

    protected $table = 'blogs';

}
