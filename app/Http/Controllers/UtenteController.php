<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtenteController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }
}
