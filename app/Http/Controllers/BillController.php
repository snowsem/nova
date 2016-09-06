<?php

namespace App\Http\Controllers;

use App\BillStatus;
use App\Contact;
use App\Workplace;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;


class BillController extends Controller
{


    public function index() {
        //return view('bills', ['bills' => Bill::all()->sortBy('BillName')] );
        return view('bills', [
            'bills' => Bill::with('who','whoId','bsn')
                ->where('BillStatus', '!=', '0')
                ->get()
        ]
        );
    }


    public function addBill($id) {
        return view('billViews.addBill', [
            'id'=>$id, 'bill_status' => BillStatus::all(),
            'contacts'=>Contact::whereIn('IDContact', Workplace::where('wpClientId', '=', $id)
                ->select('wpContactId')
                ->get())
                ->get()
            ]
        );

    }


    public function addBillPost($id, Request $request) {

        $tel = new Bill;
        $tel->BillContragentId = $request->input('BillContragentId');
        $tel->BillName = $request->input('BillName');
        $tel->BillStatus = $request->input('BillStatus');
        $tel->BillContactId = $request->input('BillContactId');
        $tel->BillDataCreate = $request->input('BillDataCreate');
        $tel->BillDatePay = $request->input('BillDatePay');
        $tel->BillText = $request->input('BillText');

        if ($tel->save()) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }

    /// ID = ID bills table
    public function editBill($id) {
        $b =Bill::where('BillId','=', $id)->first();
        $c = $b->BillContragentId;
        return view('billViews.editBill', [
            'id'=>$id,
            'bill'=>$b,
            'bill_status' => BillStatus::all(),
            'contacts'=>Contact::whereIn('IDContact',  Workplace::where('wpClientId', '=', $c)
                ->select('wpContactId')->get())
                ->select('NameContact','SoNameContact','FamilyContact','IDContact')
                ->get()
        ]
        );
    }


    public function editBillPost($id, Request $request) {

        $tel = Bill::where('BillId','=', $id)->update(
            array(

                'BillName' => $request->input('BillName'),
                'BillStatus'=>$request->input('BillStatus'),
                'BillContactId'=>$request->input('BillContactId'),
                'BillDataCreate'=>$request->input('BillDataCreate'),
                'BillDatePay'=>$request->input('BillDatePay'),
                'BillText'=>$request->input('BillText')
            )
        );


        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }

    //
}
