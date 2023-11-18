@extends('layouts.base')

@section('title','Dashboard')

@yield('portal-styles')


@section('app')

   @include('includes.sidenav')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('includes.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                @yield('content')
            </div>
        </div>
    </div>

   @include('includes.footer')






@endsection

@section('scripts')
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('assets/js/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
    <script src="{{asset('assets/js/@coreui/utils/js/coreui-utils.js')}}"></script>
{{--    <script src="{{asset('assets/js/widgets.js')}}"></script>--}}
    {{--    <script src="{{asset('vendors/chart.js/js/chart.min.js')}}"></script>--}}

@endsection
