<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = ['name', 'surname', 'city', 'content'];
    public $translatable = ['name', 'surname', 'city', 'content'];
}
