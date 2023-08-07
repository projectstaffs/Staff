<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\message\Message;
use Illuminate\Support\Facades\Cache;

class HelpController extends Controller
{
    public function getAdmin ()
    {
        //$admin = User::where('role', 'Администратор')->value('id')->first();
        $admin = User::select('id')->where('role', 'Администратор')->first();
        return $admin;
    }

    public function getMessage_in (Request $request)
    {
        $messages = Message::where('recipient', $request["data"])->get();            
        return $messages;
    } 

    public function redisAll ()
    {
        Cache::put('users', User::all());        
    } 

    public function redisShow ()
    {        
        $getUsers = json_decode(Cache::get('users'));
        foreach ($getUsers as $user) {
            if($user->name = 'Lena') {
                return $user;
            }                           
        }        
    }

    public function RedisOne ($id)
    { 
        //$user = Cache::get('users:all');
        //return $user;

        // Добавление либо изменение одного обьекта
        //$newuser = 'Созданный обьект';
        //Cache::put('users:' . $id, $newuser);

        // Удаление одного обьекта
        //Cache::forget('users:' . $id);

        // Получение одного обьекта
        //$user = Cache::get('users:' . $id);
        //return $user;
    } 
}
