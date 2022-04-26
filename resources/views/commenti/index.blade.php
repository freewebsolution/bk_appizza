@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Commenti') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($commenti->isEmpty())
                            <p>Non ci sono Commenti!</p>
                        @else
                            <div class="row">
                                <ol class="list-group list-group-numbered">
                                    @foreach($commenti as $commento)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold text-muted">
                                                    @if($commento->pizza)
                                                        <i class="fa-solid fa-pizza-slice"></i> {{$commento->pizza->titolo ??''}}
                                                        <p>
                                                            @for($i=0;$i<$commento->voti->rate;$i++)
                                                                <i class="fa-solid fa-star gold"></i>
                                                            @endFor
                                                            @for($i=5;$i>$commento->voti->rate;$i--)
                                                                <i class="fa-solid fa-star"></i>
                                                            @endFor
                                                        </p>
                                                    @endif
                                                    @if($commento->insalatona)
                                                        <i class="fa-solid fa-seedling"></i>
                                                        {{$commento->insalatona->titolo}}
                                                        <p>
                                                            @if($commento->voti)
                                                                @for($i=0;$i<$commento->voti->rate;$i++)
                                                                    <i class="fa-solid fa-star gold"></i>
                                                                @endFor
                                                                @for($i=5;$i>$commento->voti->rate;$i--)
                                                                    <i class="fa-solid fa-star"></i>
                                                                @endFor
                                                            @endif
                                                        </p>
                                                    @endif
                                                </div>

                                                <h5>{{$commento->testo}}</h5>
                                                <h6 class="text-muted"><i
                                                        class="fa-solid fa-user-astronaut"></i>
                                                    {{$commento->user->name}}
                                                </h6>
                                            </div>
                                            @if(Auth::user()->name === $commento->user->name)
                                                <a href="{{action([\App\Http\Controllers\CommentiController::class,'edit'],$commento->id)}}"
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

                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="form-group mt-3 mb-3">
                                    <div class="col-lg-12 col-lg-offset-2">
                                        <a class="btn btn-danger float-end" href="{{ URL::previous() }}"><i
                                                class="fa-solid fa-backward"></i></a>
                                    </div>
                                </div>
                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center">
                                    {!! $commenti->links() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
