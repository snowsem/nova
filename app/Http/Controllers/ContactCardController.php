<?php

namespace App\Http\Controllers;

use App\Client;
use App\Contact;
use App\Email;
use App\Telephone;
use App\Links;
use App\Workplace;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ContactCardController extends Controller
{
    public function index($id) {
        return view('contact', ['contact' => Contact::with('calls.call_status', 'calls.user_name', 'calls.contact_name', 'workplace.client')->whereidcontact($id)->first()] );
    }
    public function addTelephone($id) {

        return view('Views.addTelephone', ['id' => $id, 'p'=>'contact']);

    }
    public function addTelephonePost($id, Request $request) {

        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Telephone();
        $tel->IDEmpl = $id;
        $tel->AttrTelephone = $request->input('attr');
        $tel->DopName = $request->input('opt');
        $tel->MaskTelephone = $attrMask;
        $tel->stat = 1;

        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }


    }
    public function addEmail($id) {
        return view('Views.addEmail', ['id' => $id, 'p'=>'contact']);

    }
    public function addEmailPost($id, Request $request) {
        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Email();
        $tel->IDEmplEmail = $id;
        $tel->AttrEmail = $request->input('attr');
        $tel->DopInfo = $request->input('opt');

        $tel->stat = 1;

        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }


    }
    public function addLink($id) {
        return view('Views.addLink', ['id' => $id, 'p'=>'contact']);

    }
    public function addLinkPost($id, Request $request) {
        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Links;
        $tel->IDEmplLink = $id;
        $tel->AttrLink = $request->input('attr');
        $tel->DopInfo = $request->input('opt');

        $tel->stat = 1;

        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }

    }

    public function editName($id) {

        return view('contactViews.editName',['id'=>$id,'contact' => Contact::select('FamilyContact','NameContact','SoNameContact','SexContact')->whereidcontact($id)->first(),]);

    }
    public function editNamePost($id, Request $request){
        $tel = Contact::where('IDContact','=', $id)->update(array('NameContact' => $request->input('Name'), 'SoNameContact' => $request->input('SoName'),'FamilyContact' => $request->input('Family'),'SexContact' => $request->input('sex')));

        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }

    }
    public function editInfo($id) {

        return view('contactViews.editInfo',['id'=>$id,'contact' => Contact::whereidcontact($id)->first()]);

    }
    public function editInfoPost($id, Request $request){
        $tel = Contact::where('IDContact','=', $id)->update(
            array(

                'DopInfo'=>$request->input('DopInfo'),
                'AddressCon'=>$request->input('AddressContact'),
                'City'=>$request->input('City'),
                'DateDR'=>$request->input('DateDR')



            )
        );
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }



    }

    public function addWorkplace($id) {
        return view('contactViews.addWorkplace', ['id'=>$id,'contact' => Contact::whereidcontact($id)->first()]);
    }
    public function editWorkplace($id) {
        return view('contactViews.editWorkplace', [
            'id' => $id,
            'wp' => Workplace::where('wpId', '=', $id)->first()
            ]);
    }
    public function editWorkplacePost($id, Request $request){
        $tel = Workplace::where('wpId','=', $id)->update(
            array(

                'wpClientId'=>$request->input('wpClientId'),
                'wpContactPost'=>$request->input('wpContactPost'),
                'wpContactText'=>$request->input('wpContactText'),
                'wpDateStart'=>$request->input('wpDateStart'),
                'wpCheck'=>$request->input('wpCheck'),
                'wpDateEnd'=>$request->input('wpDateEnd')
            )
        );
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }



    public function addWorkplacePost($id, Request $request) {
        if (!empty($request->input('wpClientId'))) {
            $tel = new Workplace;
            $tel->wpContactId = $id;
            $tel->wpClientId = $request->input('wpClientId');
            $tel->wpContactPost = $request->input('wpContactPost');
            $tel->wpContactText = $request->input('wpContactText');
            $tel->wpDateStart = $request->input('wpDateStart');

            if ($request->input('wpCheck') == true) {
                //$tel->wpDateEnd = $request->input('wpDateEnd');
            } else {
                $tel->wpDateEnd = $request->input('wpDateEnd');

            }
            $tel->wpCheck = $request->input('wpCheck');


            if ($tel->save()) {
                print 'success';
            } else {
                print 'error';
            }
        } else print 'error';

    }
    public function ajaxGetClient(Request $request)
    {
        $q = $request->input('q');
        $a = Client::where('ClientName', 'LIKE', '%' . $q . '%')->get();
        return $a->toJson();
    }

        public function ajaxGetWP(Request $request){
            $q= $request->input('q');
            $a = Client::where('ClientName', 'LIKE', '%'.$q.'%')->get();
            return $a->toJson();


        //return response()->json(array('ContactID' => '12', 'FirstName' => 'CA', 'LastName'=>'asd','class'=>'','disabled'=> false));









    }



    //
}
