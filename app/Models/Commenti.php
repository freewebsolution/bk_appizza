<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commenti extends Model
{
    protected $guarded = ['id'];
    protected $table = 'commenti';

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function insalatona()
    {
        return $this->belongsTo(Insalatona::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voti()
    {
        return $this->hasOne(Voti::class);
    }



    use HasFactory;
}
