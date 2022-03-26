<?php

namespace App\Http\Controllers;

use App\Models\Commenti;
use Illuminate\Http\Request;

class CommentiController extends Controller
{
    public function index(){
        $commenti = Commenti::all();
        return $commenti;
    }
}
