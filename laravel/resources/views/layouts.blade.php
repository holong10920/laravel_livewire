<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{asset('/css/bootstrap5.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/app.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @livewireStyles
    <title>Todos App</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @livewire('search')
            </div>
            <div class="col-md-8">
                Trang chu
                @yield('content')
            </div>
        </div>
        @livewireScripts
    </div>

    <script src="{{asset('/js/bootstrap-bundle.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/sweetalert2.js')}}"></script>
</body>
</html>
