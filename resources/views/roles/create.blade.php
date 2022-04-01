@extends('layouts.app')
@section('title','Ruoli')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Crea ruolo') }}</div>

                    <div class="card-body">
                        <form method="post">

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
                                <label for="name" class="col-lg-12 control-label">Name</label>

                                <div class="col-lg-12">
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



