<?php

namespace App\Http\Controllers;

use App\Models\Voti;
use Illuminate\Http\Request;

class VotiController extends Controller
{
    public function index(){
        $voti = Voti::all();
        return $voti;
    }
}
