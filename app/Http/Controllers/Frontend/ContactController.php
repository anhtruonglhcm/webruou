<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function postContact(Request $req)
    {
        $contact          = new Contact;
        $contact->name    = $req['name'];
        $contact->address = $req['address'];
        $contact->phone   = $req['phone'];
        $contact->email   = $req['email'];
        $contact->title   = $req['title'];
        $contact->content = $req['content'];
        $contact->save();

        return back()->with('success', 'Gửi thành công');
    }
    public function dangky(Request $req)
    {
        $contact          = new Contact;
        $contact->email   = $req['email'];
        $contact->title   = $req['title'];
        $contact->save();
        $data['status'] = 'OK';

        echo json_encode($data);
    }
}