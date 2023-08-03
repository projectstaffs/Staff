<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\data\Country;
use App\Models\data\City;
use App\Models\data\Criminal;
use App\Models\data\Moving;
use App\Models\data\Smoking;
use App\Models\data\Alcohol;
use App\Models\data\Status;
use App\Models\data\Religion;
use App\Models\user\Image;

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

    public function get_country() {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
    public function get_city() {
        return $this->belongsTo(City::class, 'city', 'id');
    }
    public function get_citizen() {
        return $this->belongsTo(City::class, 'citizen', 'id');
    }
    public function get_criminal() {
        return $this->belongsTo(Criminal::class, 'criminal', 'id');
    }
    public function get_moving() {
        return $this->belongsTo(Moving::class, 'moving', 'id');
    }
    public function get_smoking() {
        return $this->belongsTo(Smoking::class, 'smoking', 'id');
    }
    public function get_alcohol() {
        return $this->belongsTo(Alcohol::class, 'alcohol', 'id');
    }
    public function get_status() {
        return $this->belongsTo(Status::class, 'status', 'id');
    }
    public function get_religion() {
        return $this->belongsTo(Religion::class, 'religion', 'id');
    }        

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
