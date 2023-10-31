<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDutie extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'dutie_id' ];
}
