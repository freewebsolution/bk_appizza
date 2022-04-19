<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;

class Voti extends Model
{
    protected  $guarded = ['id'];
    protected $table = 'voti';

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function insalatona()
    {
        return $this->belongsTo(Insalatona::class);
    }

    public function commento()
    {
        return $this->belongsTo(Commenti::class);
    }

    public function user()
    {
        return $this->hasMany(User::class,'user_id','id');
    }

    use HasFactory;
}
