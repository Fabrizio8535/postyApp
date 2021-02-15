<!DOCTYPE html>
<html lang="en">
<head>
    <!--https://www.youtube.com/watch?v=MFh0Fd7BsjE 53:27-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post App</title>

    <!--Using asset helper to map what we put in there to
    the base path of our app-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a class="p-3" href="">Home</a>
            </li>
            <li>
                <a class="p-3" href="">Dashboard</a>
            </li>
            <li>
                <a class="p-3" href="">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li>
                    <a class="p-3" href="">Anup Lamsal</a>
                </li>
                <li>
                    <a class="p-3" href="">Logout</a>
                </li>
            @endauth

            @guest
                <li>
                    <a class="p-3" href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a class="p-3" href="{{route('register')}}">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
