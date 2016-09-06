<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Purchase extends Model
{
    protected $table = "purchase";
    public function purchase_statusAll() {
        return $this->hasMany('App\PurchaseStatus', 'psId', 'purchaseStatus');
    }
    public function purchase_status() {
        return $this->hasOne('App\PurchaseStatus', 'psId', 'purchaseStatus')->select('psName', 'psColor', 'psId');
    }
    public function contragent() {
        return $this->hasOne('App\Client', 'ClientId', 'purchaseContragent')->select('ClientName', 'ClientId');;
    }
    public function contact() {
        return $this->hasOne('App\Contact', 'IDContact', 'purchaseContact')->select('NameContact','SoNameContact','FamilyContact', 'IDContact');;
    }
    //
}