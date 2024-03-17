<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Document</title>
</head>

<body>
  <nav class="flex justify-between bg-blue-900 w-full items-center">
    <ul class="flex w-full py-2 px-3 ">
      <li><a href="/"><img src="images/CPExpeditions.png" alt="" class="h-[40px]"></a></li>

    </ul>
    @auth
    <a href="{{route('logout')}}" class="text-white font-bold p-[20px] hover:bg-blue-800">Logout</a>
    @else
    <a href="{{ route('login') }}" class="text-white font-bold p-[20px] hover:bg-blue-800">Login</a>
    <a href=" {{ route('register') }}" class="text-white font-bold p-[20px] hover:bg-blue-800">Register</a>

    @endif
  </nav>

  @yield('content')


</body>

</html>