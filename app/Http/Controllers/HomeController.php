<?php

namespace App\Http\Controllers;

use App\Models\Commenti;
use App\Models\Insalatona;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $commenti = Commenti::all();
        $pizze = Pizza::all();
        $insalatone = Insalatona::all();
        $users = User::all();
        return view('dashboard', compact('commenti','pizze','insalatone','users'));
    }
}
