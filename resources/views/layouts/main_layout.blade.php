<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Document</title>
</head>

<body>

  @auth
  <x-main-navbar />
  <x-drawer />
  @else
  <nav class="flex justify-between bg-blue-900 w-full items-center">
    <ul class="flex w-full py-2 px-3 ">
      <li><a href="/"><img src="images/CPExpeditions.png" alt="" class="h-[40px]"></a></li>

    </ul>
    <a href="{{ route('login') }}" class="text-white font-bold p-[20px] hover:bg-blue-800">Login</a>
    <a href=" {{ route('register') }}" class="text-white font-bold p-[20px] hover:bg-blue-800">Register</a>

  </nav>
  @endif

  @yield('content')



</body>

</html>