<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $request)
    {
        /*
        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:50',
            'subject' => 'required|max:255',
            'message' => 'required|max:500',
        ]);
        */

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        $contact->save();

        return redirect()->route('contact')->with('success', 'Сообщение было отправлено');
    }

    public function list()
    {
        $contact = new Contact;
        //$contact->orderBy('id', 'desc')->skip(2)->take(2)->get()
        //$contact->where('subject', '!=', '5555')->get()

        return view('contact-list', ['data' => $contact->orderBy('id', 'desc')->paginate(2)]);
    }

    public function detail($id)
    {
        $contact = new Contact();
        return view('contact-detail', ['data' => $contact->find($id)]);
    }

    public function edit($id)
    {
        $contact = new Contact();
        return view('contact-edit', ['data' => $contact->find($id)]);
    }

    public function editSubmit($id, ContactRequest $request)
    {
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');

        $contact->save();

        return redirect()->route('contact-detail', $id)->with('success', 'Сообщение было отредактировано');
    }

    public function delete($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('contact-list')->with('success', 'Сообщение было удалено');
    }
}
