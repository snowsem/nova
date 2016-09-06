<?php

namespace App\Http\Controllers;

use App\Call;
use App\CallStatus;
use App\Client;
use App\Contact;
use App\Workplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CallController extends Controller
{
    public function index()
    {
        $today = date("Y-m-d");
        $lastdate = date('Y-m-d', strtotime($today . "-1 days"));


        return view('calls', ['c_status' => CallStatus::all(),
            'lastday'=>DB::table('calls')
                ->leftjoin('contacts', 'contacts.IDContact', '=', 'calls.CallContact')
                ->leftjoin('clients', 'clients.ClientId', '=', 'calls.CallContragent')
                ->leftjoin('call_status', 'call_status.callStatusId', '=', 'calls.CallType')
                ->leftjoin('users', 'users.id', '=', 'calls.CallUser')
                ->select(
                    'calls.*',
                    'contacts.NameContact',
                    'contacts.SoNameContact',
                    'contacts.FamilyContact',
                    'contacts.IDContact',
                    'clients.ClientName',
                    'clients.ClientId',
                    'users.name',
                    'users.id',
                    'call_status.*'
                )
                ->where('calls.CallDate', '=', $lastdate)
                ->orderBy('CallDate',0)
                ->orderBy('CallTime',0)
                ->get(),
            'today'=>DB::table('calls')
                ->leftjoin('contacts', 'contacts.IDContact', '=', 'calls.CallContact')
                ->leftjoin('clients', 'clients.ClientId', '=', 'calls.CallContragent')
                ->leftjoin('call_status', 'call_status.callStatusId', '=', 'calls.CallType')
                ->leftjoin('users', 'users.id', '=', 'calls.CallUser')
                ->select(
                    'calls.*',
                    'contacts.NameContact',
                    'contacts.SoNameContact',
                    'contacts.FamilyContact',
                    'contacts.IDContact',
                    'clients.ClientName',
                    'clients.ClientId',
                    'users.name',
                    'users.id',
                    'call_status.*'
                )
                ->where('calls.CallDate', '=', $today)
                ->orderBy('CallDate',0)
                ->orderBy('CallTime',0)
                ->get(),
            'call' =>DB::table('calls')
                ->leftjoin('contacts', 'contacts.IDContact', '=', 'calls.CallContact')
                ->leftjoin('clients', 'clients.ClientId', '=', 'calls.CallContragent')
                ->leftjoin('call_status', 'call_status.callStatusId', '=', 'calls.CallType')
                ->leftjoin('users', 'users.id', '=', 'calls.CallUser')
                ->orderBy('CallDate',0)
                ->orderBy('CallTime',0)
                ->select(
                    'calls.*',
                    'contacts.NameContact',
                    'contacts.SoNameContact',
                    'contacts.FamilyContact',
                    'contacts.IDContact',
                    'clients.ClientName',
                    'clients.ClientId',
                    'users.name',
                    'users.id',
                    'call_status.*'
                )
                ->get()]);
    }





    /*          return view('calls',['c_status'=>CallStatus::all(),
                'today'=>Call::where('CallDate', '=',$today)->orderBy('CallDate',0)->orderBy('CallTime',0)->get(),
                'lastday'=>Call::where('CallDate', '=', $lastdate)->orderBy('CallDate',0)->orderBy('CallTime',0)->get(),
                'call'=>Call::orderBy('CallDate',0)->orderBy('CallTime',0)->get()] );


        }

        public function add($param, $id) {
            if ($param == 'client') {
                return view('callViews.addCall',['id'=>$id,'c_status'=>CallStatus::all(),'contacts'=>Contact::where('IDContragent', '=', $id)->select('NameContact','SoNameContact','FamilyContact','IDContact','IDContragent')->get()] );


            } else {

                return view('callViews.addCallContact',['id'=>$id, 'c_status'=>CallStatus::all(),'CID'=>Contact::where('IDContact','=',$id)->select('IDContragent')->first()] );
            }
        }
    */


    public function add($param, $id) {
        $today = date("Y-m-d");
        $datetime = date('H:i:s');
        if ($param == 'client') {
            return view('callViews.addCall',[
                'date'=>$today,
                'time'=>$datetime,
                'id'=>$id,
                'c_status'=>CallStatus::all(),
                'contacts'=> Contact::whereIn('IDContact', (Workplace::where('wpClientId', '=', $id)
                    ->select('wpContactId')
                    ->get()))

                    ->select('NameContact','SoNameContact','FamilyContact','IDContact')
                    ->get()] );

        } else {

            return view('callViews.addCallContact',[
                'date'=>$today,
                'time'=>$datetime,
                'id'=>$id,
                'c_status'=>CallStatus::all(),
                'CID'=>Workplace::where('wpContactId','=',$id)
                    ->select('wpClientId')
                    ->first()] );
        }
    }

    public function addPost($param,$id, Request $request){
        $userId = Auth::user()->id;
        if ($param == 'client') {
            $tel = new Call();
            if ($request->input('CallContact') == 'client') {
                $tel->CallContragent = $id;

            } else  {
                $tel->CallContact = $request->input('CallContact');


            }
            $tel->CallDate = $request->input('CallDate');
            $tel->CallTime = $request->input('CallTime');
            $tel->CallText = $request->input('CallText');
            $tel->CallType = $request->input('CallType');
            $tel->CallUser = $userId;

            if ($tel->save()) {
                print 'success';
                //print $tel->id;
            } else {
                print 'error';
            }




        } else {
            $tel = new Call();
            if ($request->input('CallContact') == 'contact') {
                $tel->CallContact = $id;

            } else  {
                $tel->CallContragent = $request->input('CallContact');


            }
            $tel->CallDate = $request->input('CallDate');
            $tel->CallTime = $request->input('CallTime');
            $tel->CallText = $request->input('CallText');
            $tel->CallType = $request->input('CallType');
            $tel->CallUser = $userId;

            if ($tel->save()) {
                print 'success';
                //print $tel->id;
            } else {
                print 'error';
            }


        }
    }

    public function edit($param, $id, $cid) {
        if ($param == 'client') {


            return view('callViews.editCall',[
                'id'=>$id,
                'c_status'=>CallStatus::all(),
                'cid'=>$cid,
                'call'=>Call::where('CallID','=', $id)->first(),
                'contacts'=>Contact::whereIn('IDContact', (Workplace::where('wpClientId', '=', $cid)
                    ->select('wpContactId')
                    ->get()))
                    ->select('NameContact','SoNameContact','FamilyContact','IDContact')
                    ->get()] );


        } else {
            return view('callViews.editCallcontact',['id'=>$id,'c_status'=>CallStatus::all(),  'call'=>Call::where('CallID','=', $id)->first()] );


        }
    }

    public function editPost($param, $id, Request $request) {
        if ($param == 'client') {
            $cont = '';
            $clien = '';
            if ($request->input('CallContact') == 'client') {
                $clien = $request->input('CallContragent');

            } else {
                $cont = $request->input('CallContact');

            }

            $tel = Call::where('CallID','=', $id)->update(
                array(
                    'CallDate' => $request->input('CallDate'),
                    'CallTime'=>$request->input('CallTime'),
                    'CallText'=>$request->input('CallText'),
                    'CallType'=>$request->input('CallType'),
                    'CallContragent'=>$clien,
                    'CallContact'=>$cont
                )
            );
            if ($tel) {
                print 'success';
                //print $tel->id;
            } else {
                print 'error';
            }

        } else {
            $tel = Call::where('CallID','=', $id)->update(
                array(
                    'CallDate' => $request->input('CallDate'),
                    'CallTime'=>$request->input('CallTime'),
                    'CallText'=>$request->input('CallText'),
                    'CallType'=>$request->input('CallType'),

                )
            );
            if ($tel) {
                print 'success';
                //print $tel->id;
            } else {
                print 'error';
            }

        }

    }

    //
}
