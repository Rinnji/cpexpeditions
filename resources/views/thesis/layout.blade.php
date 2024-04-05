<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
              <input type="text" name="search" id="search-input" class="bg-transparent outline-none border-none" oninput="searchThesis('search-input')">
              <ul class="bg-white flex flex-col w-full absolute top-[50px] overflow-clip font-bold shadow shadow-slate-500 hidden" id="search-dropdown">

              </ul>
            </form>
          </li>
          <li>
            <button id="nav-dropdown-toggle" onclick="toggleNavDropdown()" class="text-white font-bold p-[10px] rounded-full bg-primary-blue w-[40px] h-[40px] mr-3">
              <img src="{{ asset('images/User_Icon.png') }}" alt="">
            </button>
            <div id="nav-dropdown" class="absolute top-[60px] h-0 right-4 overflow-hidden transition-all ease-in-out duration-700 opacity-0">
              <x-user-dropdown-menu />
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <li id="search-item" class="hidden">
      <a href="" class="p-2 text-primary-blue hover:bg-primary-blue-hover hover:text-white flex w-full">
        Search
      </a>
    </li>
  </nav>
  <x-drawer x-data="{ isAsideOpen: false }" />
  @yield('content')



</body>

</html>