<nav class="flex justify-between  w-full items-center">
    <ul class="flex w-full h-full ml-5">
        <li class="flex"><button id="drawer-toggle" class="py-2 px-4 hover:bg-slate-100" onclick="toggleDrawer()" x-on:click="isAsideOpen=true">
                <span class="material-symbols-outlined text-primary-yellow text-[40px]">
                    list
                </span>
            </button>
        </li>
        <li class="flex">
            <a href="{{ route('favorites.index') }}" class="py-2 px-4 hover:bg-slate-100 text-primary-yellow flex items-center text-[25px] gap-3">
                <span class="material-symbols-outlined text-[30px]">
                    star
                </span>
                My Library
            </a>


        </li>

    </ul>
    <div class="user_profile">

        <button id="nav-dropdown-toggle" onclick="toggleNavDropdown()" class="text-white font-bold p-[10px] rounded-full bg-primary-blue w-[50px] h-[50px] mr-3">
            <img src="{{ asset('images/User_Icon.png') }}" alt="">
        </button>
        <div id="nav-dropdown" class="absolute top-[60px] h-0 right-4 overflow-hidden transition-all ease-in-out duration-700 opacity-0">
            <x-user-dropdown-menu />
        </div>
    </div>
</nav>