<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'city', 'content'];
}
