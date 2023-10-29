<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Data\Country;
use App\Models\Data\City;
use App\Models\Data\Criminal;
use App\Models\Data\Moving;
use App\Models\Data\Smoking;
use App\Models\Data\Alcohol;
use App\Models\Data\Status;
use App\Models\Data\Religion;
use App\Models\User\Image;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'name', 'email', 'password', 
        'role', 'confirmed', 'surname', 'patronymic', 'phone', 'additional_phone', 'gender', 'age', 'right_work', 'drive', 'night_work', 'animal_work', 'swimming', 'about', 'is_babysitting', 'is_nurse', 'is_housekeeper', 
        'country', 'city', 'citizen', 'criminal', 'moving', 'smoking', 'alcohol', 'status', 'religion'
    ];        

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
