<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\sendContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

/**
 * @OA\Info(title="MAL-MED", version="0.1")
 *
 * @OA\Server(url="http://localhost:8000")
 **/

class ContactController extends Controller
{

/**
 * @OA\Post(
 *      path="/api/contact/save",
 *      summary="Guardar datos de contacto",
 *      @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(
 *                      property="name",
 *                      type="text"
 *                  ),
 *                  @OA\Property(
 *                      property="email",
 *                      type="text"
 *                  ),
 *                  @OA\Property(
 *                      property="phone",
 *                      type="text"
 *                    ),
 *                  @OA\Property(
 *                      property="message",
 *                      type="text"
 *                    ),
 *                   example={"name": "Pablo", "mail": "paex94@gmail.com","phone": "+54 9 351 370000", "messaje":"Test de envio de email"}
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=200,
 *              description="OK"
 *          )
 *      )
 */

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
        try {
            $contact = new Contact;
            $contact->name  = $request->name;
            $contact->email  = $request->email;
            $contact->phone  = $request->phone;
            $contact->message  = $request->message;
            Mail:: to($contact->email)->send(new SendContact($contact));
            $contact->save();
        } catch (\exception $e) {
            return response()->json("No se puedo enviar por un error: {$e->getMessage()}", 404);
        }


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
