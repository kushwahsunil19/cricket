<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    public function index()
    {
        // $faqs = Faq::all();
        // print_r($faqs);die;
        $faqs = DB::table('faq')
            ->join('faq_categories', 'faq.category_id', '=', 'faq_categories.id')
            ->select('faq.*', 'faq_categories.category as category_id')
            ->get();

        $groupedFaqs = $faqs->groupBy('category_id');

        // echo "<pre>";
        // print_r();die;
        // dd($faqs);
        return view('admin.faqs.faqs-list', compact('faqs'));
    }

    // In your controller method
    public function show()
    {
        // print_r();die;
        // die('njlkfnldsjkds');
        $categories = FaqCategory::all();
        $faqs       = Faq::orderBy('category_id')->get()->groupBy('category_id');

        return view('admin.faqs.show', compact('categories', 'faqs'));
    }

    public function create()
    {
        $categories = FaqCategory::pluck('category', 'id');

        return view('admin.faqs.add-faqs', compact('categories'));
    }

    public function faq()
    {
        $categories = FaqCategory::all();
        // echo "<pre>";
        // print_r($categories);die;

        $faqsByCategory = Faq::join('faq_categories', 'faq.category_id', '=', 'faq_categories.id')
            ->select('faq.*', 'faq_categories.category as category_name')
            ->orderBy('faq.category_id')
            ->get()
            ->groupBy('category_id');
        //     echo "<pre>";
        // print_r($faqsByCategory);die;

        return view('faqs', compact('categories', 'faqsByCategory'));
    }


    public function fetchFaqs($categoryId)
    {
        // Fetch FAQs based on the selected category
        $faqs = Faq::where('category_id', $categoryId)->get();

        // Return the view for the fetched FAQs
        return view('partials.faq-accordion', compact('faqs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question'    => 'required',
            'answer'      => 'required',
            'category_id' => 'required',
        ]);

        Faq::create([
            'question'    => $request->input('question'),
            'answer'      => $request->input('answer'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('admin.faqs-list')->with('success', 'FAQ added successfully.');
    }

    public function edit(Faq $faq)
    {
        $faqsData = Faq::find($faq->id);
        $categories = FaqCategory::pluck('category', 'id');

        return view('admin.faqs.edit-faq', compact('categories', 'faq','faqsData'));
    }

    public function addFaqs(Request $request)
    {

        // Validate the form data
        $request->validate([
            'question'    => 'required|string',
            'answer'      => 'required|string',
            'category_id' => 'required|string',
        ]);

        // Create a new FAQ
        Faq::create([
            'question'    => $request->input('question'),
            'answer'      => $request->input('answer'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->back()->with('success', 'FAQ added successfully.');
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question'    => 'required',
            'answer'      => 'required',
            'category_id' => 'required|string',
        ]);

        $faq->update([
            'question'    => $request->input('question'),
            'answer'      => $request->input('answer'),
            'category_id' => $request->input('category_id'),
        ]);

        Session::flash('success', 'Faqs updated successfully');

        return redirect()->route('admin.faqs-list')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs-list')->with('success', 'FAQ deleted successfully.');
    }
}
