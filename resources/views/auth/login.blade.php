@extends('layouts.auth')

@section('title','Login')

@section('content')
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-medium-emphasis">Sign In to your account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                            <input class="form-control"
                                   type="email"
                                   name="email"
                                   :value="old('email')" required autofocus autocomplete="username"
                                   type="text" placeholder="Username">
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <i class="fas fa-unlock"></i>
                            </span>
                            <input class="form-control"type="password" name="password" required
                                   autocomplete="current-password" placeholder="Password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4">Login</button>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>Sign up</h2>
                        <p>Don't have an account? no need to worry. Click button below to have an account.</p>
                        <form>
                            @csrf
                            <a href="{{route('register')}}"
                                class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


