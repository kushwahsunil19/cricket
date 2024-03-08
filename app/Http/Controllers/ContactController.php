<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email' => 'required|email',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'phone'   => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        $contact = $request->all();

        Mail::to('dddvk541@gmail.com')->send(new ContactMail($contact));
        return redirect()->back()->with('message', 'Message sent successfully!');
    }

    public function test_view()
    {
        return view('emails.contact');
    }

    public function showContactForm()
    {
        return view('contact');
    }

    public function contactlist()
    {
        try {
            $contactDetails = Contact::all();
        } catch (\Exception $e) {
            $contactDetails = [];
        }

        return view('admin.contact.contactlist', compact('contactDetails'));
    }
    public function delete($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            session()->flash('message', 'Contact deleted successfully!');
            $contact->delete();
        } else {
            session()->flash('error', 'Contact not found.');
        }

        return redirect()->back()->with('success', 'Contact deleted successfully.');
    }
}
