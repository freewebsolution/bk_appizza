<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Insalatona;
use Illuminate\Http\Request;

class InsalatonaApiController extends Controller
{
    public function index()
    {
        $insalatone = Insalatona::all();
        return $insalatone;
    }
}
