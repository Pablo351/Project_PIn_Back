<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $data= $request->except('_token');
        Contact::insert($data);
        Session::flash('alert-Success', 'Se ha creado con exito!!');
        return redirect()->route('contact.index');

    }

    public function list()
    {
        $data = Contact::all();
        return response()->json($data, 200);
    }

    public function save(Request $request)
    {
        $contact = new Contact;
        $contact->name  = $request->name;
        $contact->email  = $request->mail;
        $contact->phone  = $request->phone;
        $contact->message  = $request->messaje;
        $contact->save();
        return response()->json("La informacion se guardo con exito", 201);

    }


    public function show(Contact $contact)
    {
        //
    }


    public function edit($id)
    {
        $data = Contact::findorfail($id);
        Session::flash('alert-Success', 'Se ha Editado con exito!!');
        return view('contact.edit')->with(['contact' => $data]);
    }


    public function update(Request $request, $id)
    {
        $data= $request->except('_token', '_method');
        Contact::where('id','=',$id)->update($data);
        Session::flash('alert-Success', 'Se ha actualizado con exito!!');
        return redirect()->route('contact.index');
    }


    public function destroy($id)
    {
        Contact::destroy($id);
        Session::flash('alert-Success', 'Se ha eliminado con exito!!');
        return redirect()->route('contact.index');
    }
}
