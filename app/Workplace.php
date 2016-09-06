<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    protected $table = "workplace";
    //
    public function client() {
        return $this->hasOne('App\Client', 'ClientId', 'wpClientId')->select('ClientName', 'ClientId');

    }
    public function contact() {
        return $this->hasOne('App\Contact', 'IDContact', 'wpContactId')->select('*');

    }
}
