@extends('layouts.app')
@section('title','Pizze')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Insalatone') }}
                        <span class="float-end"><a class="btn btn-success btn-sm" href="{{action([\App\Http\Controllers\InsalatonaController::class,'create'])}}"><i class="fa-solid fa-circle-plus"></i></a></span>
                    </div>

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
                                        <td>Rate</td>
                                        <td>Descrizione</td>
                                        <td>Prezzo</td>
                                        <td>Evidenza</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($insalatone as $insalatona)
                                        <tr>
                                            <td>{{$insalatona->id}}</td>
                                            <td><img width="100" height="100" src="{{$insalatona->img}}" alt="img"></td>
                                            <td>
                                                <a href="{{action([\App\Http\Controllers\InsalatonaController::class,'edit'],$insalatona->id)}}">{{$insalatona->titolo}}</a>
                                            </td>
                                            <td style="white-space: nowrap">
                                                @if($insalatona->voti->count('rate') > 0)
                                                    <i class="fa-solid fa-star gold"></i>{{($insalatona->voti->sum('rate')/$insalatona->voti->count('rate'))}}
                                                @endif
                                            </td>
                                            <td>{{$insalatona->descrizione}}</td>
                                            <td>{{sprintf('%.2f',$insalatona->prezzo)}}€</td>
                                            <td>
                                                @if($insalatona->inevidenza === 1)
                                                    <span style="color: green">Yes</span>
                                                @else
                                                    <span style="color: red">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{action([\App\Http\Controllers\InsalatonaController::class,'destroy'],$insalatona->id)}}" method="get">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Sei sicuro di voler eliminare la insalatona: {{$insalatona->titolo}} ?')" class="btn btn-danger btn-sm" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                                <a href="{{action([\App\Http\Controllers\CommentiController::class,'create'])}}"><i class="fa-solid fa-comment-sms fa fa-2x mt-2"></i></a>
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
                                    {!! $insalatone->links() !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

