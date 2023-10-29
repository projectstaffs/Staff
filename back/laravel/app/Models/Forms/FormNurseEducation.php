<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNurseeducation extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nurseeducation_id' ];
}
