@extends('layouts.app')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        {{ __('Utenti') }}
                        <span class="float-end"><a class="btn btn-success btn-sm" href="{{action([\App\Http\Controllers\UtenteController::class,'create'])}}"><i class="fa-solid fa-circle-plus"></i></a></span>
                    </div>
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
                                                <a href="{{action([\App\Http\Controllers\UtenteController::class,'edit'],$user->id)}}">{{$user->email}}</a>
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
                                                <form action="{{action([\App\Http\Controllers\UtenteController::class,'destroy'],$user->id)}}" method="get">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Sei sicuro di voler eliminare la pizza: {{$user->name}} ?')" class="btn btn-danger btn-sm" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group mt-3 mb-3">
                                    <div class="col-lg-12 col-lg-offset-2">
                                        <a class="btn btn-danger float-end" href="{{ URL::previous() }}"><i
                                                class="fa-solid fa-backward"></i></a>
                                    </div>
                                </div>
                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center">
                                    {!! $users->links() !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

