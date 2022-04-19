<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Appizza</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

        <body>
        <div id="app">
            @include('shared.navbar')

            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <style>
            .image-upload{
                color: #333;
                border: 2px dashed rgba(0, 0, 0, 0.4);
                padding: 1rem;
                position: relative;
            }
            .image-upload::before {
                content: 'No image';
                color: #333;
                font-weight: bold;
                text-transform: uppercase;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 0.8rem;
                z-index: 1;
            }
            .image-upload img {
                z-index: 2;
                position: relative;
            }
        </style>
        <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('image').value = null;
                frame.src = "";
            }

        </script>
        </body>
</html>
