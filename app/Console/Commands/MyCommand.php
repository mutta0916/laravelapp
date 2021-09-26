<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use App\Models\Person;

class MyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my first command!';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // echo "\n*今日の格言*\n\n";
        // echo Inspiring::quote();
        // echo "\n\n";

        // $p = $this->argument('person');
        // if ($p != null)
        // {
        //     $person = Person::find($p);
        //     if ($person != null)
        //     {
        //         echo "\nPerson id = " . $p . "\n";
        //         echo $person->all_data . "\n";
        //         return;
        //     }
        // }
        // echo "can't get Person...";

        // $id = $this->option('id');
        // $name = $this->option('name');
        // if ($id != '?')
        // {
        //     $p = Person::find($id);
        // }
        // else
        // {
        //     if ($name != '?')
        //     {
        //         $p = Person::where('name', $name)->first();
        //     }
        //     else
        //     {
        //         $p = null;
        //     }
        // }

        // if ($p != null)
        // {
        //     echo "Person id = " . $p->id . ":\n" . $p->all_data;
        // }
        // else
        // {
        //     echo 'no Person find...';
        // }

        // インタラクティブな操作
        // $stones = $this->option('stones');
        // $max = $this->option('max');
        // echo "*** start ***\n";
        // while($stones > 0)
        // {
        //     echo("stones: $stones\n");
        //     $ask = $this->ask("you:");
        //     $you = (int)$ask;
        //     $you = $you > 0 && $you <= $max ? $you : 1;
        //     $stones -= $you;
        //     echo("stones: $stones\n");
        //     if($stones <= 0)
        //     {
        //         echo "you Lose...\n";
        //         break;
        //     }
        //     $me = ($stones - 1) % (1 + $max);
        //     $me = $me == 0 ? 1 : $me;
        //     $stones -= $me;
        //     echo "me: $me\n";
        //     if($stones <= 0)
        //     {
        //         echo "you win!!\n";
        //         break;
        //     }
        // }
        // echo "--- end ---\n";

        // 複数項目の選択
        // $choice = ['id', 'name', 'age'];
        // $this->question("find Person!");
        // $field = $this->choice("select field:", $choice, 1);
        // $value = $this->ask('input value:');

        // $p = Person::where($field, $value)->first();

        // if($p != null)
        // {
        //     $this->info('id = ' . $p->id);
        //     $this->line($p->all_data);
        // }
        // else
        // {
        //     $this->error("can't find Person.");
        // }

        //テーブル出力
        $min = (int)$this->ask('min age:');
        $max = (int)$this->ask('max age:');
        $headers = ['id', 'name', 'age', 'mail'];
        $result = Person::select($headers)
        ->where('age', '>=',$min)
        ->where('age', '<=',$max)
        ->orderBy('age')->get();
        if ($result->count() == 0)
        {
            $this->error("can't find Person.");
            return;
        }
        $data = $result->toArray();
        $this->table($headers, $data);
    }
}
