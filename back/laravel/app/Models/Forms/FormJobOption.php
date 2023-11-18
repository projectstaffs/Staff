<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormJobOption extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'joboption_id' ];
}
