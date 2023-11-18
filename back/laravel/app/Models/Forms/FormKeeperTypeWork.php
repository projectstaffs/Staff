<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKeeperTypeWork extends Model
{
    use HasFactory;
    protected $fillable = [ 'form_id', 'keepertypework_id' ];
}
