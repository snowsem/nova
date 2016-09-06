<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Bill extends Model
{
    protected $table = "bills";
    public function who() {
        return $this->hasOne('App\Client','ClientId','BillContragentId')->select('ClientName','ClientId');
    }
    public function whoId() {
        return $this->hasOne('App\Client','ClientId','BillContragentId')->select('ClientId');
    }
    public function bsn() {
        return $this->hasOne('App\BillStatus','BillStatusId','BillStatus')->select('BillStatusName', 'BillStatusColor', 'BillStatusId');
    }
    //
}