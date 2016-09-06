<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = "calls";

    public function call_status() {
        return $this->hasOne('App\CallStatus', 'callStatusId', 'CallType')->select('callStatusId','callStatusName', 'callStatusColor');
    }
    public function user_name() {
        return $this->hasOne('App\User', 'id', 'CallUser')->select('id','name');

    }
    public function contact_name() {
        return $this->hasOne('App\Contact', 'IDContact', 'CallContact')->select('IDContact','FamilyContact','NameContact','SoNameContact');

    }
    public function client_name() {
        return $this->hasOne('App\Client', 'ClientId', 'CallContragent')->select('ClientName','ClientId')->limit(1);

    }

    //
}

