@extends('layouts.app')
@section('title','Pizze')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Pizze') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($pizze->isEmpty())
                            <p>Non ci sono Pizze!</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Img</td>
                                        <td>Titolo</td>
                                        <td>Descrizione</td>
                                        <td>Prezzo</td>
                                        <td>Evidenza</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pizze as $pizza)
                                        <tr>
                                            <td>{{$pizza->id}}</td>
                                            <td><img width="100" height="100" src="{{$pizza->img}}" alt="img"></td>
                                            <td>{{$pizza->titolo}}</td>
                                            <td>{{$pizza->descrizione}}</td>
                                            <td>{{$pizza->prezzo}}</td>
                                            <td>{{$pizza->evidenza}}</td>
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

