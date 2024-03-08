<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function index()
    {
        
        $aboutUsRecord = AboutUs::first();

        if ($aboutUsRecord) {
            $aboutUsContent = $aboutUsRecord->aboutUsContent;
        } else {
            $aboutUsContent = 'Default About Us Content';
        }

        return view('admin.aboutus.about-list', compact('aboutUsContent'));
    }

    public function edit()
    {
        $aboutUsContent = AboutUs::first()->aboutUsContent;

        return view('admin.aboutus.edit', compact('aboutUsContent'));
    }

    // public function show()
    // {
    //     $aboutUs = AboutUs::latest()->first();
    //     return view('about_us.show', compact('aboutUs'));
    // }
    public function show()
    {
        // Correct
        // die('kjjbfk');
        $aboutUsContent = AboutUs::first();
        // echo "<pre>";
        // print_r($aboutUsContent);die;
        // dd($aboutUsContent);
        return view('about-us', compact('aboutUsContent'));
        // return view('about_us.show', ['aboutUsContent' => $aboutUsContent]);

    }

    public function store(Request $request)
    {
        
        $request->validate([
            'content' => 'required',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('about-us.show')
            ->with('success', 'About Us content updated successfully.');
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'content' => 'required',
        ]);

        $aboutUs = AboutUs::first();

        if ($aboutUs) {
            $aboutUs->update([
                'aboutUsContent' => $request->input('content'),
            ]);

            return redirect()->route('admin.aboutus-list')->with('success', 'About Us content updated successfully');
        } else {
            AboutUs::create(['aboutUsContent' => $request->input('content')]);
            return redirect()->route('admin.aboutus-list')->with('error', 'About Us record not found');
        }
    }
    public function aboutUs()
    {
        // die('kjjbfk');
        $aboutUsContent = AboutUs::first(); // You should adjust this based on your logic
        return view('aboutus', compact('aboutUsContent'));
    }

}
