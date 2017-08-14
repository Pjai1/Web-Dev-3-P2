<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Mail;
use App\Mail\EmailSubscription;
use Exception;
use Session;

class SubscriberController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        $subscriber->save();

        Session::flash('subscription_success', 'Thanks for subscribing!');

        try {
            Mail::to($subscriber->email)->send(new EmailSubscription());
        }
        catch(Exception $e) {
            switch($e->getCode()) {
                case 0:
                    Session::flash('subscription_failed', 'You are subscribed! But something went wrong sending the confirmation email.');
    				break;
    			default:
    				Session::flash('subscription_failed', 'Something went wrong. Don\'t hesitate to contact us if the problem keeps occurring');
    				break;
            }
        }

        return back();
    }
}
