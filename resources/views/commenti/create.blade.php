@extends('layouts.app')
@section('title','Crea commento')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crea Commento')}}</div>

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
                            <div class="form-group">
                                <label for="select" class="col-lg-12 control-label">Rate <i
                                        class="fa-solid fa-star gold"></i></label>

                                <div class="col-lg-12">
                                    <select name="rate" id="rate"
                                            class="form-control @error('rate') is-invalid @enderror" required>
                                            @for($i=1;$i<=5;$i++)
                                                    <option value="{{$i}}">{{$i}}</option>
                                            @endfor

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-lg-12 control-label">Commento</label>

                                <div class="col-lg-12">
                                    <textarea class="form-control" name="testo" id="testo" cols="30" rows="10"
                                              placeholder="Commento"></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <div class="col-lg-12 col-lg-offset-2">
                                    <button type="reset" class="btn btn-warning"><i
                                            class="fa-solid fa-rectangle-xmark"></i></button>
                                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i>
                                    </button>
                                    <a class="btn btn-danger float-end" href="/admin/commenti"><i
                                            class="fa-solid fa-backward"></i></a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





