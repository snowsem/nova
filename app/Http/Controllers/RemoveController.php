<?php

namespace App\Http\Controllers;

use App\Email;
use App\Links;
use App\Telephone;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Link;

class RemoveController extends Controller
{
    //
    public function telephone($id) {
        if($pro = Telephone::where('IDTelephone', '=', $id)->delete()) {
            print 'success';
        }


    }
    public function editTelephone($id) {
        return view('Views.editTelephone', ['id'=>$id, 't' => Telephone::whereidtelephone($id)->first()] );

    }
    public function editTelephonePost($id, Request $request) {

        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = Telephone::where('IDTelephone','=', $id)->update(array('AttrTelephone' => $request->input('attr'), 'DopName'=>$request->input('opt'),'MaskTelephone'=>$attrMask));
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }





    }

    public function email($id) {
        if($pro = Email::where('IDEmail', '=', $id)->delete()) {
            print 'success';
        }
    }
    public function editEmail($id) {
        return view('Views.editEmail', ['id'=>$id, 't' => Email::whereidemail($id)->first()] );

    }
    public function editEmailPost($id, Request $request) {

        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = Email::where('IDEmail','=', $id)->update(array('AttrEmail' => $request->input('attr'), 'DopInfo'=>$request->input('opt')));
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }

    }
    public function link($id) {
        if($pro = Links::where('IDLink', '=', $id)->delete()) {
            print 'success';
        }

    }
    public function editLink($id) {
        return view('Views.editLink', ['id'=>$id, 't' => Links::whereidlink($id)->first()] );

    }
    public function editLinkPost($id, Request $request) {

        $attrMask = preg_replace('/[^\d]/', '', $request->input('attr'));
        $tel = Links::where('IDLink','=', $id)->update(array('AttrLink' => $request->input('attr'), 'DopInfo'=>$request->input('opt')));
        if ($tel) {
            print 'success';
            //print $tel->id;
        } else {
            print 'error';
        }


    }

}
