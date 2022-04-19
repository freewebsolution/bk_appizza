<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insalatona extends Model
{
    protected $table= 'insalatona';
    protected  $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany('App\models\Commenti','insalatona_id','id');
    }
    public function voti()
    {
        return $this->hasMany('App\models\Voti','insalatona_id','id');
    }
    use HasFactory;
}
