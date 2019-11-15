<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
   public function setSessionKey(Request $request) {
      $request->session()->put('key',uniqid());
   }
}
