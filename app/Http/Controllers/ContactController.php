<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\ContactMessage;



class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('emails.contact');
    }

    public function sendContactMail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save the message to the database
        ContactMessage::create($data);

        // Send the email
        Mail::to('owner@example.com')->send(new ContactMail( $data));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


   
       
        public function index()
        {
            $messages = ContactMessage::all();  // Use `all()` to retrieve all messages
            return view('admin/messages', compact('messages'));
        }
       
       

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */


public function showMessage($id)
{
    $message = ContactMessage::findOrFail($id);
    return view('admin/showMessage', compact('message')); // Note: 'message' not 'messages'
}

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
public function destroy($id)
{
    $message = ContactMessage::find($id);

    if (!$message) {
        return redirect()->route('admin/messages')->with('error', 'Message not found.');
    }

    $message->delete();
    return redirect()->route('admin/messages')->with('success', 'Message deleted successfully.');
}
}
