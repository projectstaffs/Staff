<?php

namespace App\Models\message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['sender', 'recipient', 'name', 'surname', 'city', 'country', 'phone', 'email', 'title', 'content', 'time', 'reading'];
}
