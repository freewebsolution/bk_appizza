@extends('layouts.app')
@section('title', 'Pizza: '.$pizza->titolo)
@section('content')

    <div class="container col-md-10 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="header">{{ $pizza->titolo }}</h2>
                <p> {{ $pizza->descrizione }} </p>
            </div>
            <div class="clearfix"></div>
        </div>
        @if($commenti)
            @foreach($commenti as $commento)
                <div class="card mt-4">
                    <div class="card-body">
                        <h4>Commento:</h4> {!! $commento->testo !!}
                        <h5>
                            <i class="fa-solid fa-star gold"></i>
                            {{number_format((float)$commento->voti->rate,2,'.','')}}
                        </h5>
                        <h6 class="text-muted"><i
                                class="fa-solid fa-user-astronaut"></i>
                            {{$commento->user->name}}
                            @if($commento->user->id === Auth::id())
                                <br><br>
                                <div class="btn-group">
                                    <a class="btn btn-warning btn btn-sm me-2"
                                       href="{{action([\App\Http\Controllers\CommentiController::class,'edit'],$commento->id)}}"
                                       class="me-sm-2">Edit
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form
                                        action="{{action([\App\Http\Controllers\CommentiController::class,'destroy'],$commento->id)}}"
                                        method="get">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            onclick="return confirm('Sei sicuro di voler eliminare il commento id: {{$commento->id}} ?')"
                                            class="btn btn-danger btn-sm" type="submit">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </h6>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="card mt-4">
            <div class="card-body">
                @if($commenti->isEmpty() || !$auth)
                    <form method="post" action="/admin/comment">

                        @foreach($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @csrf
                        <div class="form-group">
                            <legend>Vota <i class="fa-solid fa-star gold"></i></legend>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <select class="form-select" name="voto" id="voto" required>
                                    <option value="" selected disabled hidden>Vota</option>
                                    @for($i=1; $i<=5;$i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <legend>Commenta</legend>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" rows="3" id="testo" name="testo"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="utente_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="pizza_id" value="{{ $pizza->id }}">
                        <input type="hidden" name="pizza_type" value="App\pizza">
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Commenta</button>
                            </div>
                        </div>
                    </form>
                @endif
                <div class="form-group mt-3 mb-3">
                    <div class="col-lg-12 col-lg-offset-2">
                        <a class="btn btn-danger float-end" href="/admin/pizze"><i
                                class="fa-solid fa-backward"></i></a>
                    </div>
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $commenti->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

