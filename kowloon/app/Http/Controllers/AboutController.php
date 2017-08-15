<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;
use Session;

class AboutController extends Controller
{
    public function index() {
        return view('about');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|max:255|email',
            'message' => 'required'
        ]);

        $message = new ContactMessage();

        $message->email = $request->email;
        $message->message = $request->message;

        $message->save();

        Session::flash('about_form_status', 'Succesfully sent message!');

        return back();
    }
}
