<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\User;
class SearchController extends Controller

{
    public function search(Request $request) {
        $q = $request->input('q');

       $c =  Client::where('ClientName','like', '%'.$q.'%')
           ->orWhere('ClientPublicName','like', '%'.$q.'%')
           ->orWhere('ClientWorkName','like', '%'.$q.'%')
           ->orwhereHas('telephones', function($qq) use ($q)
           {   $v = preg_replace('/[^\d]/', '', $q);
               if (empty($v)) {

               } else {
                   $q = preg_replace('/[^\d]/', '', $q);

               }

               $qq->where('MaskTelephone', 'like', '%'.$q.'%');

           })
           ->orwhereHas('emails', function($qq) use ($q)
           {
               $qq->where('AttrEmail', 'like', '%'.$q.'%');

           })
           ->orwhereHas('links', function($qq) use ($q)
           {
               $qq->where('AttrLink', 'like', '%'.$q.'%');

           })
           ->orderBy('ClientName')
           ->get();

        $ci =  Contact::where('FamilyContact','like', '%'.$q.'%')
            ->orwhere('NameContact','like', '%'.$q.'%')
            ->orwhere('SoNameContact','like', '%'.$q.'%')

            ->orwhereHas('telephones', function($qq) use ($q)
            {
                $v = preg_replace('/[^\d]/', '', $q);
                if (empty($v)) {

                } else {
                    $q = preg_replace('/[^\d]/', '', $q);

                }
                $qq->where('MaskTelephone', 'like', '%'.$q.'%');

            })
            ->orwhereHas('emails', function($qq) use ($q)
            {
                $qq->where('AttrEmail', 'like', '%'.$q.'%');

            })
            ->orwhereHas('links', function($qq) use ($q)
            {
                $qq->where('AttrLink', 'like', '%'.$q.'%');

            })
            ->orderBy('FamilyContact')
            ->get();

        return view('search',['clients'=>$c, 'contacts'=>$ci]);
    }

}