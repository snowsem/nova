<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;


class ClientController extends Controller
{
    public function __construct()
    {

    }
    public function index() {


        return view('clients', ['clients' => Client::all()->sortBy('ClientName')] );
    }
    public function addClient() {

        return view('clientViews.addClient' );

    }
    public function addClientPost(Request $request) {
        $tel = new Client();
        $tel->ClientName = $request->input('Name');
        if ($tel->save()) {
            print $tel->id;
        } else {
            print 'error';
        }

    }
    //
}
