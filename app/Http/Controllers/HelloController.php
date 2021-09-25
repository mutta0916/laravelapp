<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;
use App\Jobs\MyJob;
use App\Models\Person;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Events\PersonEvent;
use App\MyClasses\PowerMyService;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class HelloController extends Controller
{
    function __construct()
    {
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('event:clear');
        return redirect()->route('hello');
    }

    public function index($id = -1)
    {
        // $data = [
        //     'msg' => 'This is Vue.js application.',
        //     'data' => Person::get(),
        // ];
        // return view('hello.index', $data);

        // $service->setId(1);
        // $msg = $service->say();
        // $result = Person::get();
        // $data = [
        //     'input' => '',
        //     'msg' => $msg,
        //     'data' => $result,
        // ];

        // dump-serverの利用
        // if ($id > 0)
        // {
        //     $msg = 'id = ' . $id;
        //     $result = [Person::find($id)];
        // }
        // else
        // {
        //     $msg = 'all people data.';
        //     $result = Person::get();
        // }
        // $data = [
        //     'msg' => $msg,
        //     'data' => $result
        // ];

        // dump($data);

        // Artisanコマンド実行結果の取得
        $opt = [
            '--method'=>'get',
            '--path'=>'hello',
            '--sort'=>'uri',
            '--compact'=>null,
        ];
        $output = new BufferedOutput;
        Artisan::call('route:list', $opt, $output);
        $msg = $output->fetch();

        $data = [
            'msg' => $msg,
        ];
        return view('hello.index', $data);
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);
        $event = new PersonEvent($person);
        event($event);
        $data = [
            'input' => '',
            'msg' => 'id=' . $id,
            'data' => [$person],
        ];
        return view('hello.index', $data);
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route('hello');
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa','bbb@ccc', 1234];
        $person->save();

        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Person::get()->toJson();
        }
        else
        {
            return Person::find($id)->toJson();
        }
    }
}
