<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTypework extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'typework_id' ];
}
