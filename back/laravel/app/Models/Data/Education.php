<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Education extends Model
{
    use HasFactory; use HasTranslations;

    protected $fillable = ['title'];
    public $translatable = [ 'title' ];
}
