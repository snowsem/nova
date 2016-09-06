<?php

namespace App\Http\Controllers;

use App\BillStatus;
use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bill;


class AdminController extends Controller
{
    public function addTicket() {
        return view('adminViews.add_ticket');
    }
}
