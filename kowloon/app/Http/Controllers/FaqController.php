<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function index(Request $request) {
        $faqs = null;
        $searchStr = '';
        $data = null;

        if($request->query('query')) {
            $searchStr = strip_tags($request->query('query'));

            if (!empty($searchStr) && !ctype_space($searchStr)) {
                $splitStr = preg_split('/\s+/', $searchStr, -1, PREG_SPLIT_NO_EMPTY);

                $faqs = Faq::where(function($q) use ($splitStr) {
                    foreach ($splitStr as $key => $string) {
                        $q->orWhere('question', 'like', '%'.$string.'%')->orWhere('answer', 'like', '%'.$string.'%');
                    }
                })->paginate(3);
            }

            foreach (Input::except('page') as $input => $value)
            {
                $faqs->appends($input, $value);
            }
    
        } else {
            $data = 'Ongeldige zoekopdracht.';
        }

        return view('faq', [
            'faqs' => $faqs,
            'searchStr' => $searchStr,
            'data' => $data
        ]);
    }
}
