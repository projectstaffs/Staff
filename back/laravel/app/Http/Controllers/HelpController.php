<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Message\Message;

use App\Jobs\Emails\UserForgotPasswordJob;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HelpController extends Controller
{
    public function getAdmin ()
    {
        if(!Cache::has('users')) { Cache::put('users', User::all()); }
        $getItems = Cache::get('users'); 

        foreach ($getItems as $item) {
            if($item->role = 'Администратор') {
                return $item->id;
            }                           
        }        
    }

    public function getMessage_in (Request $request)
    {
        if(!Cache::has('messages')) { Cache::put('messages', Message::all()); }
        $getItems = Cache::get('messages');
        $messages = array();

        foreach ($getItems as $item) {
            if($item->recipient == $request["data"]) {
                array_push($messages, $item);
            }                           
        }
        return $messages;
    }

    public function forgotPassword (Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $password = Str::random(5);
            $user->password = Hash::make($password);
            $user->save();

            Cache::put('users', User::all());
            UserForgotPasswordJob::dispatch($user->name, $user->email, $password);
            return 'Пароль успешно изменен.';
        } else {
            return response()->json(['error' => 'Нет пользователя с такой электронной почтой.'], 401);
        }        
    }    
}
