<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UtenteController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function edit($id){
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles()->pluck('name')->toArray();
        return view('users.edit',compact('user','roles','selectedRoles'));
    }

    public function update($id, UserEditRequest $request){
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }
        $user->save();
        $user->syncRoles($request->get('role'));
        return redirect(action([UtenteController::class,'edit'],$user->id))->with('status','Utente modificato con successo!');

    }
}
