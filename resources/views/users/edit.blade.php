@extends('layouts.app')
@section('title','Users')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Utente') }} > {{$user->name}}</div>

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
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name"
                                           value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-lg-12 control-label">Email</label>

                                <div class="col-lg-12">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                           value="{{ $user->email }}">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="select" class="col-lg-12 control-label">Role</label>

                                    <div class="col-lg-12">
                                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}" @if(in_array($role->name,$selectedRoles)) selected="selected"@endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-lg-12 control-label">Password</label>

                                    <div class="col-lg-12">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-lg-12 control-label">Confirm password</label>

                                    <div class="col-lg-12">
                                        <input type="password" class="form-control" name="password_confirmation">
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


