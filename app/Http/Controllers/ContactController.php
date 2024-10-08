<?php

namespace App\Http\Controllers;

use App\Mail\ContactMaill;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function propertyInquiry(Request $request, $property_id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:255',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message . '\n This message has been sent via ' . route('single-property', $property_id) . ' website.';
        $contact->save();
        Mail::send(new ContactMaill($contact));
        // send user & admin message via queue
//        ProcessContactMail::dispatch($contact);
        //Mail::send(new ContactMail($contact));


        return redirect(route('single-property', $property_id))->with(['message' => 'Your message has been sent.']);
       // return $this->view('welcome')->to('test@email.com')->from('test@from.com')->subject('We have received your request');


    }
}
