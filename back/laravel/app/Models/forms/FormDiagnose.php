<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDiagnose extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'diagnose_id' ];
}
