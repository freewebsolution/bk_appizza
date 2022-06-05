<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Insalatona;
use Illuminate\Http\Request;

class InsalatonaApiController extends Controller
{
    public function index()
    {
        $insalatone = Insalatona::with('voti', 'comments')->distinct()->get();
        return $insalatone;
    }
    public function show ($id) {
        $insalatona= Insalatona::whereId($id)->with('voti','comments')->firstOrfail();
        return $insalatona;
    }
}
