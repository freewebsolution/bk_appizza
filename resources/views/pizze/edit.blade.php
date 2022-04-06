@extends('layouts.app')
@section('title','Create Pizza')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifica Pizza')}} > {{$pizza->titolo}}</div>

                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">

                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @csrf
                            <div class="container col-md-6">
                                <div class="mb-5">
                                    <p class="text-center">Carica la tua immagine <i class="fa-solid fa-camera"></i></p>
                                    <input name="image" class="form-control" type="file" id="image" onchange="preview()">
                                    <input type="hidden" value="{{$pizza->img}}" name="img" id="img">
                                </div>
                                <div class="image-upload"><img id="frame" src="{{$pizza->img}}" class="img-fluid" /></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-lg-12 control-label">Titolo</label>

                                <div class="col-lg-12">
                                    <input type="text" class="form-control" id="titolo" placeholder="Titolo" name="titolo" value="{{$pizza->titolo}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-lg-12 control-label">Descrizione</label>

                                <div class="col-lg-12">
                                    <textarea class="form-control" name="descrizione" id="descrizione" cols="30" rows="10" placeholder="Descrizione">{{$pizza->descrizione}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prezzo" class="col-lg-12 control-label">Prezzo</label>

                                <div class="col-lg-12">
                                    <input type="number" id="prezzo" class="form-control" name="prezzo" value="{{$pizza->prezzo}}" step="any">
                                </div>
                            </div>

                            <div class="form-check mt-2 mb-2">

                                <div class="col-lg-12">
                                    <input type="checkbox" class="form-check-input" id="inevidenza" name="inevidenza" value="1" @if($pizza->inevidenza ===1) checked @endif>
                                    <label class="form-check-label" for="inevidenza">Metti in evidenza</label>
                                </div>
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <div class="col-lg-12 col-lg-offset-2">
                                    <button type="reset" class="btn btn-warning"><i class="fa-solid fa-rectangle-xmark"></i></button>
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i></button>
                                    <a class="btn btn-danger float-end" href="/admin/pizze"><i class="fa-solid fa-backward"></i></a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




