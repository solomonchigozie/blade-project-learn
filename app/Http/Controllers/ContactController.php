<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function contactsubmit(ContactStoreRequest $request){
        // dd($request->all());
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        dd('savedd');
    }

    public function contactsubmitwithoutrequest(Request $request){
        $request->validate([
            'name'=>'required|min:2',
            'email'=>['required','email','max:40']
        ],
        [
            'name.required'=>'Hey, please fill the name field',
            'name.min'=>'The name is too short, put your real name',
            'email.required'=>'please fill in an email address'
        ]
        );
    }
}
