<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function create()
   {
    return view('emails.contact');
   }

   public function send()
   {
       request()->validate(['email' => 'required', 'email']);

       Mail::to(request('email'))->send(new ContactMe);

       return redirect()->back();
   }
}
