<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Utente extends Model
{
    protected $table = 'utente';
    protected $guarded = 'id';
    use HasFactory;
    
}
