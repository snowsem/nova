<?php
namespace App\Http\Controllers;
use App\Bill;
use App\Workplace;
use App\Purchase;
use App\PurchaseStatus;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class PurchaseController extends Controller
{
    public function index() {
        return view('purchase', [
            'purchase' => Purchase::with('contragent', 'purchase_status')
                ->where('purchaseStatus', '!=', '0')
                ->get()
        ] );
    }
    public function add($id) {
        return view('purchaseViews.addPurchase',
            [
                'id'=>$id,
                'p_status' => PurchaseStatus::all(),
                'contacts'=>Contact::whereIn('IDContact', Workplace::where('wpClientId', '=', $id)
            ->select('wpContactId')
            ->get())
            ->get()
          ] );
    }
    public function addPost($id, Request $request){
        $tel = new Purchase();
        $tel->purchaseName = $request->input('purchaseName');
        $tel->purchaseStatus = $request->input('purchaseStatus');
        $tel->purchaseContact = $request->input('purchaseContact');
        $tel->purchaseDateStart= $request->input('purchaseDateStart');
        $tel->purchaseDateEnd = $request->input('purchaseDateEnd');
        $tel->purchaseLink = $request->input('purchaseLink');
        $tel->purchaseNote = $request->input('purchaseNote');
        $tel->purchaseContragent = $id;
        if ($tel->save()) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }
    public function edit($id) {
        $b =Purchase::where('purchaseId','=', $id)->first();
        $c = $b->purchaseContragent;
        return view('purchaseViews.editPurchase', [
            'id'=>$id,'purchase'=>$b,
            'p_status' => PurchaseStatus::all(),
            'contacts'=>Contact::whereIn('IDContact',  Workplace::where('wpClientId', '=', $c)
                ->select('wpContactId')->get())
                ->select('NameContact','SoNameContact','FamilyContact','IDContact')
                ->get()
        ] );
    }
    public function editPost($id, Request $request) {
        $tel = Purchase::where('purchaseId','=', $id)->update(
            array(
                'purchaseName' => $request->input('purchaseName'),
                'purchaseStatus'=>$request->input('purchaseStatus'),
                'purchaseContact'=>$request->input('purchaseContact'),
                'purchaseDateStart'=>$request->input('purchaseDateStart'),
                'purchaseDateEnd'=>$request->input('purchaseDateEnd'),
                'purchaseNote'=>$request->input('purchaseNote'),
                'purchaseLink'=>$request->input('purchaseLink')
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