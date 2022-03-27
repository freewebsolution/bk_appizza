<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;

class PizzaApiController extends Controller
{
    public function index(){
        $pizze = Pizza::all();
        return $pizze;
}
}
