<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        #ELOQUENT ORM
        //insert
        // $user = new User();
        // $user->name = 'chiny pop';
        // $user->email = 'chiny@text.com';
        // $user->password= '12345678';
        // $user->save();

        //delet
        // $user = User::findOrFail(1);
        // $user->delete();

        //mass insert
        // User::insert([
        //     [
        //         'name'=>'dany',
        //         'email'=>'dany@cook.com',
        //         'password'=>'dany',
        //     ],
        //     [
        //         'name'=>'tailor',
        //         'email'=>'tailor@cook.com',
        //         'password'=>'tailor',
        //     ],
        //     [
        //         'name'=>'banny',
        //         'email'=>'banny@cook.com',
        //         'password'=>'banny',
        //     ],
        //     [
        //         'name'=>'cappy',
        //         'email'=>'cappy@cook.com',
        //         'password'=>'cappy',
        //     ],
        // ]);

        //conditional clause
        // $product = Product::where(['id'=>5])->where("price",'<','400')->get();
        // $product = Product::where('name','LIKE','%ducim%')->orWhere('description','LIKE','%enim%')->get();
        // $product = Product::whereIn('id',[1,2,3,4,5])->get();
        // $product = Product::whereBetween('price',[50,200])->get();
        // dd($product);

        //query Scope ==> coming from the model
        // $product = Product::Range()->get();

        //soft deletes
        // $product = Product::find(20)->delete();

        #retreive soft deleted information
        // $product =Product::withTrashed()->find(1);
        // $product =Product::withTrashed()->get();
        // $product =Product::onlyTrashed()->get();      
        // dd($product);

        //restore soft deleted data
        // $product =Product::withTrashed()->find(1)->restore();  
        // dd($product);

        //permanently delete data
        // $product =Product::withTrashed()->find(20)->forceDelete();  
        // dd($product);

        

        return view('welcome');
    }

    public function querybuilder(){
        //insert
        // DB::table('users')->insert(
        //     [
        //         [
        //             'name'=>'jane',
        //             'email'=>'jane@text.com',
        //             'password'=>bcrypt('password')
        //         ],
        //         [
        //             'name'=>'kane',
        //             'email'=>'kane@text.com',
        //             'password'=>bcrypt('password')
        //         ]
        //     ]
        // );

        //get data
        // $get = DB::table('users')->where('id',1)->first();
        // return $get;

        //update data
        // $update = DB::table('users')->where('id',1)->update(
        //     [
        //         'name'=>'king behovanahius ekpowemenemene'
        //     ]
        // );

        //retrieve a column
        // $ret = DB::table('users')->pluck('name','id')->toArray();
        // dd($ret);

        //Aggregates
        // $product = DB::table('products')->get()->count();
        // $product = DB::table('products')->get()->max('price'); //get max price
        // $product = DB::table('products')->get()->min('price'); //get min price
        // $product = DB::table('products')->get()->sum('price'); //get sum price
        $product = DB::table('products')->get()->avg('price'); //get average price
        dd($product);

        return view('welcome');
    }
}
