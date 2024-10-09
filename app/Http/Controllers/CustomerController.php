<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $customers = Customers::all(); //get all customers

        $customers = Customers::when($request->has('search'), function($query) use ($request) {
            $query->where('firstname','LIKE',"%$request->search%")
            ->orWhere('lastname','LIKE',"%$request->search%")
            ->orWhere('email','LIKE',"%$request->search%")
            ->orWhere('phone','LIKE',"%$request->search%");
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? $request->order : 'DESC')->get();

        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customers();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->store('','public');
            $filePath = '/uploads/'.$fileName;
            $customer->image = $filePath;
        }

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->account_number = $request->accountnumber;
        $customer->about = $request->about;

        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customers::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer =  Customers::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, string $id)
    {
        $customer = Customers::findOrFail($id);

        if($request->hasFile('image')){
            //delete previous image
            File::delete(public_path($customer->image));

            $image = $request->file('image');
            $fileName = $image->store('','public');
            $filePath = '/uploads/'.$fileName;
            $customer->image = $filePath;
        }

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->account_number = $request->accountnumber;
        $customer->about = $request->about;

        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer= Customers::findOrFail($id);
        // File::delete(public_path($customer->image)); //in using softdelete do not delete files or pictures
        $customer->delete();

        return redirect()->route('customers.index');
    }

    function trashIndex(Request $request) {

        $customers = Customers::when($request->has('search'), function($query) use ($request) {
            $query->where('firstname','LIKE',"%$request->search%")
            ->orWhere('lastname','LIKE',"%$request->search%")
            ->orWhere('email','LIKE',"%$request->search%")
            ->orWhere('phone','LIKE',"%$request->search%");
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? $request->order : 'DESC')->onlyTrashed()->get();

        return view('customer.trash', compact('customers'));
    }

    function restore(int $id){
        $customer = Customers::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->back();

    }

    function forceDestroy(int $id){
        $customer = Customers::onlyTrashed()->findOrFail($id);
        File::delete(public_path($customer->image));
        $customer->forceDelete();

        return redirect()->back();

    }
}
