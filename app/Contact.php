<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";

    public function telephones() {
        return $this->hasMany('App\Telephone', 'IDEmpl','IDContact')->where('telephone.stat', '=', '1');
    }
    public function emails() {
        return $this->hasMany('App\Email', 'IDEmplEmail', 'IDContact')->where('email.stat', '=', '1');
    }
    public function links() {
        return $this->hasMany('App\Links', 'IDEmplLink', 'IDContact')->where('link.stat', '=', '1');
    }

    public function clientn() {
        return $this->hasOne('App\Client','ClientId','IDContragent');
    }
    public function calls() {
        return $this->hasMany('App\Call', 'CallContact','IDContact')->orderBy('CallDate',0)
            ->orderBy('CallTime',0);
    }
    //
    public function workplace() {
        return $this->hasMany('App\Workplace', 'wpContactId','IDContact')->where('wpClientId', '!=', '0');
    }
    //
}
