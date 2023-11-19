<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendors/simplebar.css')}}">
    <!-- Main styles for this application-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{asset('assets/css/examples.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">

    @yield('styles')
</head>
<body>
    @yield('app')

    @yield('scripts')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('assets/js/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simplebar/js/simplebar.min.js')}}"></script>
</body>
</html>
