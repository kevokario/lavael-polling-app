@extends('layouts.auth')

@section('title','Reset password')

@section('content')


    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-12 p-4 mb-0">
                <div class="card-body">
                    <h1>Reset Password</h1>
                    <p class="text-medium-emphasis">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <br>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf


                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control"
                                   id="email"
                                   type="email"
                                   name="email"
                                   :value="old('email')" required autofocus autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                        </div>

                        <div class="row">
                            <div class="col-6 form-group mb-3 mb-3">
                                <button class="btn btn-primary px-4">Email Password Reset Link</button>
                            </div>
                            <div class="col-12 text-end">
                                <a href="{{route('login')}}">Remembered your password account? login here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
