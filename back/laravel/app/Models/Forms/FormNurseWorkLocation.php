<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNurseWorkLocation extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nurseworklocation_id' ];
}
