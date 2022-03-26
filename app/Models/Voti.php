<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voti extends Model
{
    protected  $guarded = 'id';
    protected $table = 'voti';
    use HasFactory;
}
