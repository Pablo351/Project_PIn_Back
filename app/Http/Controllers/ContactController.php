<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $data['contacts'] = Contact::paginate(10);
        return view('contact.index', $data);
    }


    public function create()
    {
        return view('contact.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Contact $contact)
    {
        //
    }


    public function edit(Contact $contact)
    {
        return view('contact.edit');
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }


    public function destroy(Contact $contact)
    {
        //
    }
}
