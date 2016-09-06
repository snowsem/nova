<?php
namespace App\Http\Controllers;
use App\Address;
use App\ClientCat;
use App\ClientProp;
use App\ClientSubCat;
use App\Contact;
use App\Email;
use App\Call;
use App\Telephone;
use App\Workplace;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Links;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class ClientCardController extends Controller
{
    public function index($id) {
        if (!empty($id)) {
        }
        $return = Client::getClient($id);
        return view('client', [
            'client' =>  $return['client'],
            'calls'=>   $return['calls']
        ]);
    }
    public function addTelephone($id) {
        return view('Views.addTelephone', ['id' => $id, 'p'=>'client']);
    }
    public function addTelephonePost($id, Request $request) {
        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Telephone();
        $tel->IDEmpl = $id;
        $tel->AttrTelephone = $request->input('attr');
        $tel->DopName = $request->input('opt');
        $tel->MaskTelephone = $attrMask;
        $tel->stat = 2;
        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }
    }
    public function addEmail($id) {
        return view('Views.addEmail', ['id' => $id, 'p'=>'client']);
    }
    public function addEmailPost($id, Request $request) {
        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Email();
        $tel->IDEmplEmail = $id;
        $tel->AttrEmail = $request->input('attr');
        $tel->DopInfo = $request->input('opt');
        $tel->stat = 2;
        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }
    }
    public function addLink($id) {
        return view('Views.addLink', ['id' => $id, 'p'=>'client']);
    }
    public function addLinkPost($id, Request $request) {
        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = new Links;
        $tel->IDEmplLink = $id;
        $tel->AttrLink = $request->input('attr');
        $tel->DopInfo = $request->input('opt');
        $tel->stat = 2;
        if ($tel->save()) {
            print 'success';
        } else {
            print 'error';
        }
    }
    public function editName($id) {
        return view('clientViews.editName',['id'=>$id,'client' => Client::select('ClientProperty','ClientName')->whereClientid($id)->first(),'prop_list'=>ClientProp::orderBy('ClientPropertyName')->get()]);
    }
    public function editNamePost($id, Request $request){
        $tel = Client::where('ClientId','=', $id)->update(array('ClientName' => $request->input('name'), 'ClientProperty'=>$request->input('opt')));
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }
    public function editInfo($id) {
        return view('clientViews.editInfo',['id'=>$id,'client' => Client::whereClientid($id)->first(),'cat'=>ClientCat::all(),'sub_cat'=>ClientSubCat::all()]);
    }
    public function editInfoPost($id, Request $request){
        $tel = Client::where('ClientId','=', $id)->update(
            array(
                'ClientPublicName' => $request->input('ClientPublicName'),
                'ClientWorkName'=>$request->input('ClientWorkName'),
                'ClientBorn'=>$request->input('ClientBorn'),
                'ClientType'=>$request->input('ClientType'),
                'ClientVid'=>$request->input('ClientVid'),
                'ClientInfo'=>$request->input('ClientInfo'),
                'ClientAddress'=>$request->input('ClientAddress'),
                'ClientCity'=>$request->input('ClientCity'),
                'ClientIndex'=>$request->input('ClientIndex'),
                'ClientInn'=>$request->input('ClientInn'),
                'ClientInfoContr'=>$request->input('ClientInfoContr')
            )
        );
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }
    public function addContact($id){
        return view('clientViews.addContact',['id'=>$id]);
    }
    public function addAddress($id){
        return view('clientViews.addAddress',['id'=>$id]);
    }
    public function addAddressPost($id, Request $request){
        $tel = new Address;
        $tel->client_address = $id;
        $tel->index_address = $request->input('index_address');
        $tel->sub_address = $request->input('sub_address');
        $tel->city_address = $request->input('city_address');
        $tel->street_address = $request->input('street_address');
        $tel->home_address = $request->input('home_address');
        $tel->korp_address = $request->input('korp_address');
        $tel->kv_address = $request->input('kv_address');
        $tel->comment_address = $request->input('comment_address');
        if ($tel->save()) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }

    public function editAddress($id){
        return view('clientViews.editAddress',['id'=>$id, 'address'=>Address::whereid_address( $id)->first()]);
    }
    public function editAddressPost($id, Request $request){
        $tel = Address::where('id_address','=', $id)->update(
            array(

                'index_address'=>$request->input('index_address'),
                'sub_address'=>$request->input('sub_address'),
                'city_address'=>$request->input('city_address'),
                'street_address'=>$request->input('street_address'),
                'home_address'=>$request->input('home_address'),
                'korp_address'=>$request->input('korp_address'),
                'kv_address'=>$request->input('kv_address'),
                'comment_address'=>$request->input('comment_address')

            )
        );
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }
    }
    public function addContactPost($id, Request $request){
        $tel = new Contact;


        $tel->NameContact = $request->input('Name');
        $tel->FamilyContact = $request->input('Family');
        $tel->SoNameContact = $request->input('SoName');
        $tel->SexContact = $request->input('Sex');
        $tel->PostContact = $request->input('Post');
        if ($tel->save()) {
            $a = new Workplace;
            $a->wpClientId = $id;
            $a->wpContactId = $tel->id;
            $a->wpContactPost = $request->input('wpContactPost');
            $a->wpContactText = $request->input('wpContactText');
            $a->wpDateStart = $request->input('wpDateStart');

            if ($request->input('wpCheck') == true) {
                //$tel->wpDateEnd = $request->input('wpDateEnd');
            } else {
                $a->wpDateEnd = $request->input('wpDateEnd');

            }
            $a->wpCheck = $request->input('wpCheck');

            $a->save();

            ///print 'success';
            print $tel->id;
        } else {
            print 'error';
        }
    }
    //
}