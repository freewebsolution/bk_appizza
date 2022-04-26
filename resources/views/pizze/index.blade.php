@extends('layouts.app')
@section('title','Pizze')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Pizze') }}
                        <span class="float-end"><a class="btn btn-success btn-sm" href="{{action([\App\Http\Controllers\PizzaController::class,'create'])}}"><i class="fa-solid fa-circle-plus"></i></a></span>
                    </div>

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
                                        <td>#</td>
                                        <td>Img</td>
                                        <td>Titolo</td>
                                        <td>Rate</td>
                                        <td>Descrizione</td>
                                        <td>Prezzo</td>
                                        <td>Evidenza</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pizze as $pizza)
                                        <tr>
                                            <td>{{$pizza->id}}</td>
                                            <td><img width="100" height="100" src="{{$pizza->img}}" alt="img"></td>
                                            <td>
                                                <a href="{{action([\App\Http\Controllers\PizzaController::class,'edit'],$pizza->id)}}">{{$pizza->titolo}}</a>
                                            </td>
                                            <td style="white-space: nowrap">
                                                @if($pizza->voti->count('rate') > 0)
                                                    <i class="fa-solid fa-star gold"></i>
                                                    {{number_format((float)$pizza->voti->sum('rate')/$pizza->voti->count('rate'),2,'.','')}}
                                                @endif
                                            </td>
                                            <td>{{$pizza->descrizione}}</td>
                                            <td>{{sprintf('%.2f',$pizza->prezzo)}}€</td>
                                            <td>
                                                @if($pizza->inevidenza === 1)
                                                    <span style="color: green">Yes</span>
                                                    @else
                                                    <span style="color: red">No</span>
                                                @endif
                                            </td>
                                            <td style="white-space: nowrap">
                                                <form class="float-lg-start me-1"
                                                    action="{{action([\App\Http\Controllers\PizzaController::class,'destroy'],$pizza->id)}}" method="get">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Sei sicuro di voler eliminare la pizza: {{$pizza->titolo}} ?')" class="btn btn-danger btn-sm" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                                <a href="{{action([\App\Http\Controllers\PizzaController::class,'show'],$pizza->titolo)}}"><i class="fa-solid fa-file-pen fa fa-2x mt-1"></i>
                                                </a>
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
                                    {!! $pizze->links() !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

