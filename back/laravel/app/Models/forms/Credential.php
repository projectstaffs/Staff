<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'email', 'phone', 'content', 'user_id'];
}
