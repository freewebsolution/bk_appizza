<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commenti extends Model
{
    protected $guarded = 'id';
    protected $table = 'commenti';
    use HasFactory;
}
