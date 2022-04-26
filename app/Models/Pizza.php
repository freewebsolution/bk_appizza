<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $table= 'pizza';
    protected  $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany(Commenti::class,'pizza_id','id');
    }
    public function voti()
    {
        return $this->hasMany(Voti::class,'pizza_id','id');
    }

    public function commenti()
    {
        return $this->morphMany(Commenti::class,'menu');
    }
    use HasFactory;
}
