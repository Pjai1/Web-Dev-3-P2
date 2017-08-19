<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;
use App\Repositories\FaqRepository;
use Session;
// use LaravelLocalization;

class AboutController extends Controller
{
    private $faqs;

    public function __construct(FaqRepository $faqs) {
        $this->faqs = $faqs;
    }

    public function index() {
        $faqs = $this->faqs->getAll();
        
        return view('about', [
            'faqs' => $faqs
        ]);
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
