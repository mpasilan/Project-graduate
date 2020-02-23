@extends('layouts.admin_layout')
@section('content')

<!-- Page Heading -->
          <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="h3 mb-0 text-gray-800">Add user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('manage_users.index') }}">Manage user</a></li>
              <li class="breadcrumb-item active">Add user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

          <!-- Content Row -->

          	<div class="container-fluid">
             @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

            @php

                Session::forget('success');

            @endphp

        </div>

        @endif
             <form method="POST" action="{{ route('manage_users.store') }}">
                        @csrf

                        <div class="form-group row">
                           

                            <div class="col-md-5 offset-md-3">
                                <input id="name" placeholder="{{ __('Name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-5 offset-md-3">
                                <input id="email" placeholder="{{ __('E-Mail Address') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-5 offset-md-3">
                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-5 offset-md-3">
                                <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row"> 
                        <div class="col-md-2 offset-md-3">
                      <select name="user_role" id="user_role" class="form-control @error('user_role') is-invalid @enderror">
                       <option value="">Select role...</option>
                      @foreach ($role as $r)
                          
                          <option value="{{ $r->id }}">{{ $r->role_name }}</option>
                        @endforeach 
                      </select>
                                @error('user_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>



          	
             </div>





@endsection