@extends('layouts.app')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Utenti') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($users->isEmpty())
                            <p>Non ci sono Utenti!</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Nome</td>
                                        <td>Email</td>
                                        <td>Ruolo</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                <a href="{{action([\App\Http\Controllers\UtenteController::class,'edit',],$user->id)}}">{{$user->email}}</a>
                                            </td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    @if($role->name === 'Manager')
                                                    <span class="badge bg-danger">
                                                    @else
                                                        <span class="badge bg-success">
                                                    @endif
                                                            {{$role->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <span style="color: red"><i class="fa-solid fa-trash-can"></i></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

