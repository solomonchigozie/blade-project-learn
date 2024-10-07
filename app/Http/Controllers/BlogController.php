<?php

namespace App\Http\Controllers;

use App\Models\BlogCustom;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        // $blog = BlogCustom::insert(['title'=>'monday','post'=>"lorem ipsum dolor isment"]);
        $blog = BlogCustom::all();
        dd($blog);
    }
}
