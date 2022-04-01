<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store(RoleFormRequest $request)
    {
        Role::create(['name'=>$request->get('name')]);
        return redirect('/admin/roles/create')->with('status','Ruolo creato con successo!');
    }
}
