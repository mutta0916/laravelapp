<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterFace;
use Illuminate\Http\Request;
use App\Facades\MyService;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index(Request $request)
    {
        $data = [
            'msg'=>$request->hello,
            'data'=>$request->alldata
        ];

        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'name' => 'Taro',
            'mail' => 'taro@yamada',
            'tel' => '090-999-9999',
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return redirect()->route('hello', $data);
    }
}
