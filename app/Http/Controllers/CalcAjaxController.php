<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CalcAjaxController extends Controller
{

    public function receive(Request $request)
    {
        $inputs = $request->all();

        if (empty($inputs)) {
        	return;
        }
        
        $ip_address = $request->ip();
        $session_key = $request->session()->get('key');
        $inputs['ip_address'] = $ip_address;
        $inputs['session_key'] = $session_key;

        return response()->json(['success' => $this->handleAjax($inputs)]);
    }

    function handleAjax($inputs) {
    	DB::table('debug')->insert(
        	['dump' => serialize($inputs)]
        );
        $inputs = $this->sanitizeInputs($inputs);
        return $this->pushDB($inputs);
		//return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    function sanitizeInputs($inputs) {
    	// I would sanitize data as needed here
    	return $inputs;
    }

    function pushDB($inputs) {
    	return DB::table('mc_values')->insert(
        	['uuid' => time(),
        	'principal' => $inputs['values']['principal'],
        	'apr' => $inputs['values']['apr'],
        	'term' => $inputs['values']['term'],
        	'payment' => $inputs['values']['payment'],
        	'ip_address' => $inputs['ip_address'],
        	'session_id' => $inputs['session_key'],
        	'created_at' => date('Y-m-d h:i:s')]
        );
    }
}