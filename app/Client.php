<?php
namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Contact;
class Client extends Model
{
    protected $table = "clients";
    public function telephones() {
        return $this->hasMany('App\Telephone', 'IDEmpl','ClientId')->where('telephone.stat', '=', '2');
    }
    public function addresses() {
        return $this->hasMany('App\Address', 'client_address','ClientId');
    }
    public function emails() {
        return $this->hasMany('App\Email', 'IDEmplEmail', 'ClientId')->where('email.stat', '=', '2');
    }
    public function links() {
        return $this->hasMany('App\Links', 'IDEmplLink', 'ClientId')->where('link.stat', '=', '2');
    }
    public function contacts() {
        return $this->hasMany('App\Contact','IDContragent','ClientId');
    }
    public function property() {
        return $this->hasOne('App\ClientProp','ClientPropertyId','ClientProperty');
    }
    public function vid() {
        return $this->hasOne('App\ClientSubCat','ClientVidId','ClientVid');
    }
    public function type() {
        return $this->hasOne('App\ClientCat','ClientTypeId','ClientType');
    }
    public function files() {
        return $this->hasMany('App\FileClient','fileClient','ClientId');
    }
    public function bills() {
        return $this->hasMany('App\Bill','BillContragentId','ClientId')->join('billstatus', 'bills.BillStatus', '=', 'billstatus.BillStatusId')->where('bills.BillStatus', '!=','0');
    }
    public function purchase() {
        return $this->hasMany('App\Purchase','purchaseContragent','ClientId')->join('purchase_status', 'purchase.purchaseStatus', '=', 'purchase_status.psId')->where('purchase.purchaseStatus', '!=','0');
    }
    public function workplace() {
        return $this->hasMany('App\Workplace', 'wpClientId','ClientId')->where('wpContactId', '!=', '0');
    }
    
    public static function getClient($id) {
        $calls = DB::table('calls')->where('calls.CallContragent', '=', $id)
            ->orwhereIn('calls.CallContact',
                Workplace::where('workplace.wpClientId','=',$id)
                    ->select(
                        'workplace.wpContactId')->get())
            ->leftjoin('clients', 'clients.ClientId', '=', 'calls.CallContragent')
            ->leftjoin('call_status', 'call_status.callStatusId', '=', 'calls.CallType')
            ->leftjoin('users', 'users.id', '=', 'calls.CallUser')
            ->leftjoin('contacts', 'contacts.IDContact', '=', 'calls.CallContact')
            ->orderBy('CallDate','desc')
            ->orderBy('CallTime','desc')
            ->get();
        $return['calls'] = $calls;
        $return['client'] = self::with('workplace.contact')->whereClientid($id)->first();
        return $return;
    }


    //
}