<?php

namespace App\Http\Controllers;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Bus\UpdatedBatchJobCounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'msg'=>$request->hello,
        ];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = [
            'msg'=>$request->bye,
        ];
        return view('hello.index', $data);
    }
}
