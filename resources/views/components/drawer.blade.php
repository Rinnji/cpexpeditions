<aside id="main-drawer" class="d">
    <div class="flex gap-3 p-2 items-center border-b-2 border-white">
        <button onclick="toggleDrawer()"><span class="material-symbols-outlined text-white text-[50px] mt-4">list</span></button>
        <a href="{{ route('dashboard') }}" class="flex">
            <h1 class="text-white">CPE</h1>
            <h1 class="text-primary-yellow">xpeditions</h1>
        </a>
    </div>
    <ul class="border-b-2 border-white">
        <li>
            <a href="{{ route('profile.edit') }}" class="aside-link">
                <span class=" material-symbols-outlined text-[40px]">
                    person
                </span>
                <p class="text-[20px]">My Profile</p>
            </a>

        </li>
        <li>
            <a href="{{ route('favorites.index') }}" class="aside-link">
                <span class=" material-symbols-outlined text-[40px]">
                    star
                </span>
                <p class="text-[20px]">My Favorites</p>
            </a>

        </li>
        <li>
            <a href="{{ route('thesis.index') }}" class="aside-link">
                <span class="material-symbols-outlined text-[40px]">
                    description
                </span>
                <p class="text-[20px]">Theses</p>
            </a>

        </li>
        <li>
            <a href="{{ route('about') }}" class="aside-link">
                <span class="material-symbols-outlined text-[40px]">
                    groups
                </span>
                <p class="text-[20px]">About us</p>
            </a>

        </li>
    </ul>

    @if (Auth::user()->is_admin)
    <a href="{{ route('users.index') }}" class="aside-link">
        <span class="material-symbols-outlined text-[40px]">group</span>
        <p class="text-[20px]">Users</p>
    </a>
    <a href="{{route('thesis.create') }}" class="aside-link">
        <span class="material-symbols-outlined text-[40px]">post_add</span>
        <p class="text-[20px]">Add Thesis</p>
    </a>
    @endif

</aside>