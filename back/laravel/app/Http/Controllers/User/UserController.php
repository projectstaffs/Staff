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
        /*$users = array();
        $count = 0;
        foreach ($Users as $item) {
            if($item->role == "Администратор") {
                //array_push($users, $item);
                unset($Users[$count]);
                // возможно $count--;               
            }
            $count++;                           
        }*/
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
            'name' => $request->name,
            'email' => $request->email,            
            'password' => $request->password,
            
            'role' => $request->role, 'confirmed' => $request->confirmed, 'surname' => $request->surname, 'patronymic' => $request->patronymic, 'phone' => $request->phone, 'additional_phone' => $request->additional_phone, 'gender' => $request->gender, 'age' => $request->age, 'right_work' => $request->right_work, 'drive' => $request->drive, 'night_work' => $request->night_work, 'animal_work' => $request->animal_work, 'swimming' => $request->swimming, 'about' => $request->about, 'is_babysitting' => $request->is_babysitting, 'is_nurse' => $request->is_nurse, 'is_housekeeper' => $request->is_housekeeper,          
            'smoking' => $request->smoking, 'country' => $request->country, 'citizen' => $request->citizen, 'criminal' => $request->criminal, 'moving' => $request->moving, 'alcohol' => $request->alcohol, 'status' => $request->status, 'religion' => $request->religion, 'city' => $request->city,            
        ]);                
        $user->save();
        $token = auth()->tokenById($user->id);
        
        $temp = new UserResource($user);
        Cache::put('users', User::all()); 
        UserGreetingJob::dispatch($user->name, $user->email, $temp_password);       
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
        
        $user->name = $request['name'];
        $user->email = $request['email'];            
        $user->password = $request['password'];
            
        $user->role = $request['role']; 
        $user->confirmed = $request['confirmed']; 
        $user->surname = $request['surname']; 
        $user->patronymic = $request['patronymic']; 
        $user->phone = $request['phone']; 
        $user->additional_phone = $request['additional_phone']; 
        $user->gender = $request['gender'];
        $user->age = $request['age']; 
        $user->right_work = $request['right_work']; 
        $user->drive = $request['drive']; 
        $user->night_work = $request['night_work']; 
        $user->animal_work = $request['animal_work']; 
        $user->swimming = $request['swimming'];
        $user->about = $request['about']; 
        $user->is_babysitting = $request['is_babysitting']; 
        $user->is_nurse = $request['is_nurse']; 
        $user->is_housekeeper = $request['is_housekeeper'];         
        
        $user->smoking = $request['smoking_id']; 
        $user->country = $request['country_id']; 
        $user->citizen = $request['citizen_id']; 
        $user->criminal = $request['criminal_id']; 
        $user->moving = $request['moving_id']; 
        $user->alcohol = $request['alcohol_id']; 
        $user->status = $request['status_id']; 
        $user->religion = $request['religion_id']; 
        $user->city = $request['city_id'];       

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
