@extends('layouts.base')

@section('styles')

@endsection

@section('app')
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

