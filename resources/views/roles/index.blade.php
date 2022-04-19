@extends('layouts.app')
@section('title','Roles')
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
                        @if($roles->isEmpty())
                            <p>Non ci sono Ruoli!</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Nome</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
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
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


