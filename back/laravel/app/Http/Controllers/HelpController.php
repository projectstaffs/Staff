<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Message\Message;
use App\Models\Message\Review;

use App\Jobs\Emails\UserForgotPasswordJob;
use App\Jobs\Emails\UserGreetingJob;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Services\MySocket;

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
            UserForgotPasswordJob::dispatch($user->email, $request->lang, $password);
            return 'Пароль успешно изменен.';
        } else {
            return response()->json(['error' => 'Нет пользователя с такой электронной почтой.'], 401);
        }        
    } 

    public function testMail (Request $request)
    {
        $email = $request->input('email');
        
        $user = User::where('email', $email)->first();
        if ($user) {
            $user->email_verified_at = "2023-12-15";
            $user->save();
            
            $socket = new MySocket();
            $socket->sendMessage($user->id);
            Cache::put('users', User::all());            
        }
        $appUrl = env('APP_REAL_DOMAIN'); 
        return redirect($appUrl);              
    }

    public function blockUser (Request $request)
    {               
        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->confirmed = false;
            $user->save();
            
            $socket = new MySocket();
            $socket->sendBlock($user->id);
            Cache::put('users', User::all());            
        }             
    }
    
    public function restoreUser (Request $request)
    {               
        $user = User::where('id', $request->id2)->first();
        if ($user) {
            $user->confirmed = true;
            $user->save();
            
            $socket = new MySocket();
            $socket->sendRestore($user->id);
            Cache::put('users', User::all());            
        }             
    }
}
