@extends('layouts.auth')

@section('title','Register')

@section('content')
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-12 p-4 mb-0">
                <div class="card-body">
                    <h1>Register</h1>
                    <p class="text-medium-emphasis">Create your account</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                                <input class="form-control"
                                       id="name"
                                       type="text"
                                       name="name"
                                       :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                                <input class="form-control"
                                       id="email"
                                       type="email"
                                       name="email"
                                       :value="old('email')" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                                <input class="form-control"
                                       id="password"
                                       type="password"
                                       name="password"
                                       :value="old('password')" required autofocus autocomplete="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                                <input class="form-control"
                                       id="password_confirmation"
                                       type="password"
                                       name="password_confirmation"
                                       :value="old('password_confirmation')" required autofocus autocomplete="password_confirmation" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                        </div>

                        <div class="row">
                            <div class="col-6 form-group mb-3 mb-3">
                                <button class="btn btn-primary px-4">Register</button>
                            </div>
                            <div class="col-12 text-end">
                                <a href="{{route('login')}}">Already have an account? login here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


