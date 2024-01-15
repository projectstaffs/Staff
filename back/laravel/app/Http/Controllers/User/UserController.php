<?php

namespace App\Http\Controllers\User;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Jobs\Emails\UserGreetingJob;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Cache::has('users')) { Cache::put('users', User::all()); }
        $Users = Cache::get('users');

        return $Users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) {
        $temp_password = $request->password;        
        $request->password = Hash::make($request->password);        
        
        $user = new User([
            'name' => [
               'en' => $request->name['en'],
               'ua' => $request->name['ua']
            ],
            'email' => $request->email,            
            'password' => $request->password,            
            'role' => $request->role, 'confirmed' => $request->confirmed, 
            'surname' => [
               'en' => $request->surname['en'],
               'ua' => $request->surname['ua']
            ], 
            'phone' => $request->phone, 'phone_code' => $request->phone_code, 
            'gender' => [
               'en' => $request->gender['en'],
               'ua' => $request->gender['ua']
            ],
            'age' => $request->age,
            'animal_work' => [
               'en' => $request->animal_work['en'],
               'ua' => $request->animal_work['ua']            
            ], 
            'about' => [
               'en' => $request->about['en'],
               'ua' => $request->about['ua']
            ],                      
            'country' => $request->country, 'city' => $request->city            
        ]);                
        $user->save();
        $token = auth()->tokenById($user->id);
        
        $temp = new UserResource($user);
        Cache::put('users', User::all()); 
        UserGreetingJob::dispatch($user->email, $request->lang);       
        return response(['access_token' => $token, 'user' => $temp]);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::find($id);      
        
        $user->name = [
               'en' => $request->name['en'],
               'ua' => $request->name['ua']
            ];
        $user->email = $request['email'];            
        $user->password = $request['password'];
            
        $user->role = $request['role']; 
        $user->confirmed = $request['confirmed']; 
        $user->surname = [
               'en' => $request->surname['en'],
               'ua' => $request->surname['ua']
            ];
        $user->phone = $request['phone']; $user->phone_code = $request['phone_code'];
        $user->gender = [
               'en' => $request->gender['en'],
               'ua' => $request->gender['ua']
            ];        
        $user->age = $request['age']; 
        $user->animal_work = [
               'en' => $request->animal_work['en'],
               'ua' => $request->animal_work['ua']            
            ];
        $user->about = [
               'en' => $request->about['en'],
               'ua' => $request->about['ua']
            ];        
        
        //$user->country = $request['country'];         
        $user->city = $request['city'];       

        $user->save();
        $temp = new UserResource($user);
        Cache::put('users', User::all());
        return $temp;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
