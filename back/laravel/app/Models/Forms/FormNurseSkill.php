<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNurseSkill extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'nurseskill_id' ];
}
