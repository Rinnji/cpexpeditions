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
  <nav>
    <ul class="flex w-full bg-accent-yellow items-center justify-between">
      <li>
        <ul class="flex items-center">
          <li class="flex"><button class="py-2 px-4 hover:bg-slate-100" onclick="toggleDrawer()" x-on:click="isAsideOpen=true">
              <span class="material-symbols-outlined text-primary-yellow text-[40px]">
                list
              </span>
            </button>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="flex text-[30px] font-bold">
              <h1 class=" text-primary-blue">
                CPE
              </h1>
              <h1 class="text-primary-yellow">xpeditions</h1>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <ul class="flex mr-4 gap-3">
          <li>
            <a href="">
              <span class="material-symbols-outlined text-primary-blue text-[40px]">
                refresh
              </span>
            </a>
          </li>
          <li>
            <form action="{{ route('thesis.search') }}" method="GET" class="flex bg-white rounded items-center">
              @csrf
              <span class="material-symbols-outlined text-primary-yellow border-r-2 border-primary-yellow">
                search
              </span>
              <input type="text" name="search" id="" class="bg-transparent outline-none border-none ">
            </form>
          </li>
          <li>
            <button>
              <img src="{{ asset('images/User_Icon.png') }}" alt="" class="w-[40px]">
            </button>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <x-drawer x-data="{ isAsideOpen: false }" />
  @yield('content')



</body>

</html>