<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Models\data\HousekeeperDutie;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class RedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('aleksander13@ukr.net')->send(new UserMail());

        /*$before = microtime(true);        
        $test = Cache::get('housekeeperduties');
        $after = microtime(true);
        dd($after - $before);*/

        //Cache::put('housekeeperduties', HousekeeperDutie::all());
        //$test = HousekeeperDutie::all();

        /*Cache::put('mygame', 'gothic'); 
        $str = Cache::get('mygame');
        Cache::put('mygame', 'gothicnew');
        Cache::forget('mygame');
        dd($str);*/
        
        /*$str = 'Some data';
        $result = '';
        if(Cache::has('mygame')) {
            $result = Cache::get('mygame');
        } else {
            Cache::put('mygame', $str);
        }*/

        /*$str = 'Some data';
        $result = Cache::remember('myData', 1440 * 60  ,function() use ($str) {
            return $str;
        });
        dd($result);*/

        /*$str = 'Some data';
        $result = Cache::rememberForever('myData', function() use ($str) {
            return $str;
        });
        dd($result);*/
    }
}
