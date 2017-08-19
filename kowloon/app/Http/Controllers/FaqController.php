<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Faq;
use App\Repositories\FaqRepository;
use App\Repositories\ProductsRepository;
use LaravelLocalization;
use Session;

class FaqController extends Controller
{
    private $faqs;
    private $products;

    public function __construct(FaqRepository $faqs, ProductsRepository $products) {
        $this->faqs = $faqs;
        $this->products = $products;
    }

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
                        $q->orWhere(LaravelLocalization::getCurrentLocale().'_question', 'like', '%'.$string.'%')->orWhere(LaravelLocalization::getCurrentLocale().'_answer', 'like', '%'.$string.'%');
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

    public function indexAdminFaqs() {
        $faqs = $this->faqs->getAll();

        return view('admin.faqs', [
            'faqs' => $faqs
        ]);
    }

    public function create()
    {
        $products = $this->products->getAll();

        return view('admin.faqcreate', [
            'products' => $products
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nl_question' => 'required',
            'nl_answer' => 'required',
            'fr_question' => 'required',
            'fr_answer' => 'required',
        ]);
        $faq = new Faq();
        $faq->nl_question = $request->nl_question;
        $faq->nl_answer = $request->nl_answer;
        $faq->fr_question = $request->fr_question;
        $faq->fr_answer = $request->fr_answer;
        $faq->save();

        if($request->products)
        {
            $faq->products()->attach($request->products);
        }

        Session::flash('faq_created', 'Faq created successfully');

        return redirect()->action('FaqController@indexAdminFaqs');
    }

    public function edit($id)
    {
        $faq = $this->faqs->getById($id);
        $products = $this->products->getAll();

        return view('admin.faqedit', [
            'products' => $products,
            'faq' => $faq
        ]);
    }

    public function update(Request $request, $id) {
        $faq = $this->faqs->getById($id);

        $this->validate($request, [
            'nl_question' => 'required',
            'nl_answer' => 'required',
            'fr_question' => 'required',
            'fr_answer' => 'required',
        ]);

        $faq->nl_question = $request->nl_question;
        $faq->nl_answer = $request->nl_answer;
        $faq->fr_question = $request->fr_question;
        $faq->fr_answer = $request->fr_answer;

        if($request->products)
        {
            $faq->products()->sync($request->products);
        } else {
            $faq->products()->detach();
        }

        $faq->save();

        Session::flash('faq_updated', 'Faq updated successfully');

        return redirect()->action('FaqController@indexAdminFaqs');
    }

    public function destroy($id) {
        $faq = $this->faqs->getById($id);
        $faq->products()->detach();
        $faq->delete();

        Session::flash('faq_deleted', 'Faq deleted successfully');

        return back();
    }
}
