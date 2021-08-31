<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        $result = DB::table('people')->get();
        $data = [
            'msg' => 'Database access.',
            'data' => $result,
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
