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
    protected $signature = 'my:cmd {--id=?} {--name=?}';

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

        $id = $this->option('id');
        $name = $this->option('name');
        if ($id != '?')
        {
            $p = Person::find($id);
        }
        else
        {
            if ($name != '?')
            {
                $p = Person::where('name', $name)->first();
            }
            else
            {

            }
        }
    }
}
