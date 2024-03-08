<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        // $feedbacks = Feedbacks::all();
        // return view('feedbacks.index', compact('feedback'));
        // die('hh');
        return view('feedback');
    }


    public function frontendFeedbackList(){
        return view('feedback');
    }
    public function store(Request $request)
    {
        $request->validate([
            'rating'  => 'required',
            'comment' => 'required',
        ]);

        $feedback = new Feedback([
            'rating'  => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

    public function feedbackList()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.feedback-list', compact('feedbacks'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating'  => 'required',
            'comment' => 'required',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->update($validatedData);

        return redirect()->route('admin.feedback-list')->with('success', 'Feedback updated successfully!');
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback-list', ['feedback' => $feedback]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback) {
            session()->flash('message', 'Feedback deleted successfully!');
            $feedback->delete();
        } else {
            session()->flash('error', 'Feedback not found.');
        }

        return redirect()->route('admin.feedback-list');
    }
}
