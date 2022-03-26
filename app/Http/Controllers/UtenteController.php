<?php

namespace App\Http\Controllers;

use App\Models\Utente;
use Illuminate\Http\Request;

class UtenteController extends Controller
{
    public function index(){
        $utenti = Utente::all();
        return $utenti;
    }
}
