<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', ['data'=>$request->data]);
    }

    public function post(Request $request) {
        $msg = $request->msg;
        $data = ['msg'=>'こんににちは、'.$msg . 'さん！'];
        return view('hello.index', $data);
    }
}
