<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;
class ContactController extends Controller
{
    //
    public function __construct()
    {


    }
    public function index() {

        return view('contacts', ['contacts' => Contact::all()->sortBy('FamilyContact')] );
    }
    public function addContact(){
        return view('contactViews.addContact');

    }
    public function addContactPost( Request $request){
        $tel = new Contact;

        $tel->NameContact = $request->input('Name');
        $tel->FamilyContact = $request->input('Family');
        $tel->SoNameContact = $request->input('SoName');
        $tel->SexContact = $request->input('Sex');



        if ($tel->save()) {
            ///print 'success';
            print $tel->id;
        } else {
            print 'error';
        }


    }
}
