<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pizza;

class PizzaApiController extends Controller
{
    public function index()
    {
        $pizze = Pizza::with('voti', 'comments')->distinct()->get();
        return $pizze;
    }

    public function show ($id) {
       $pizza = Pizza::whereId($id)->with('voti','comments')->firstOrfail();
       return $pizza;
    }
}
