<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    //

    public function index()
    {

        //$contacts=Contact::all();
        return view("contact");
    }




    public function store(Request $request)
    {
        //dd($request);
        try {
            $contacts = new contact();
            $contacts->name = $request->name;
            $contacts->email=$request->email;
            $contacts->number=$request->number;
            $contacts->subject=$request->subject;
            $contacts->message=$request->message;
            $contacts->save();
            Alert::success('Succès', "contact crée avec succès");
        } catch (Exception $exception) {
            Log::debug($exception);
            Alert::error('Erreur', "une erreur est survenue");
        }

        return redirect()->back();
    }
    public function edit(Contact $contact)
    {
        //


        return view("contact", compact("contact"));
    }












}
