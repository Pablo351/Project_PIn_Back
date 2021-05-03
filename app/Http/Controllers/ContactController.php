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

    public function search(Request $request)
    {
        $data = $request -> input('search');
        $query = Contact::select()
        ->where('Name','like',"%$data%")
        ->orwhere('Phone','like',"%$data%")
        ->orwhere('Email','like',"%$data%")
        ->get();

        return view('contact.index') ->with(["contacts" => $query]);
    }


    public function create()
    {
        return view('contact.create');
    }


    public function store(Request $request)
    {
        // $data= $request->all();
        $data= $request->except('_token');
        Contact::insert($data);
        return redirect()->route('contact.index');

    }


    public function show(Contact $contact)
    {
        //
    }


    public function edit($id)
    {
        $data = Contact::findorfail($id);
        return view('contact.edit')->with(['contact' => $data]);
    }


    public function update(Request $request, $id)
    {
        $data= $request->except('_token', '_method');
        Contact::where('id','=',$id)->update($data);
        return redirect()->route('contact.index');
    }


    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->route('contact.index');
    }
}
