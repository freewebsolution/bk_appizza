<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utente extends Model
{
    protected  $table = 'utente';
    protected $guarded = 'id';
    use HasFactory;
}
