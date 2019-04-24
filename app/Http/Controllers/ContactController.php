<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreatecontactRequest;
use Illuminate\Http\Request;
use Exception;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contactos = Contact::paginate(20);
        $userid = $request->user()->id;
        $contactsofusernofilter = Contact::where('user_id', $userid);
        $contactsofuser = $contactsofusernofilter->where('estado', 'nuevo')->paginate(20);
        return view ('contactos', [
            'contactos' => $contactos,
            'contactsofuser' => $contactsofuser,
        ]);
    }
    public function add()
    {
        return view('newcontact');
    }
    public function store(CreatecontactRequest $request)
    {
        try {
            $contacto = Contact::create([
                'telefono' => $request->input('numero'),
                'nombre' => $request->input('nombre'),
                'user_id' => $request->input('user_id'),
                'estado' => $request->input('estado'),
            ]);

            return redirect('/Contactos')->withSuccess('Contacto agregado');

        } catch (Exception $e) {
            report($e);
            return redirect('/Contactos')->withError('No se agrego por que el contacto esta duplicado');
        }
    }
    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->first();

        $contact->delete();

        return redirect('/Contactos')->withSuccess('Contacto Eliminado');
    }
    public function status (CreatecontactRequest $request)
    {
        $contactid = $request->input('contactid');
        $contacto = Contact::where('id', $contactid)->first();

        $contacto->delete();
    }





}


