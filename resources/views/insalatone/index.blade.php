@extends('layouts.app')
@section('title','Insalatone')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Insalatone') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($insalatone->isEmpty())
                            <p>Non ci sono Insalatone!</p>
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
                                    @foreach($insalatone as $insalatona)
                                        <tr>
                                            <td>{{$insalatona->id}}</td>
                                            <td><img width="100" height="100" src="{{$insalatona->img}}" alt="img"></td>
                                            <td>{{$insalatona->titolo}}</td>
                                            <td>{{$insalatona->descrizione}}</td>
                                            <td>{{$insalatona->prezzo}}</td>
                                            <td>{{$insalatona->evidenza}}</td>
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

