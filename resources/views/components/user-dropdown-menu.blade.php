<ul class="bg-primary-yellow flex flex-col text-primary-blue font-bold p-2 rounded-lg gap-3 overflow-hidden">
    <li class="flex py-2 px-10 border-b-2 border-white">
        <span class="material-symbols-outlined text-[70px]">
            person
        </span>

    </li>
    <li class="text-center py-2  rounded ">
        {{ ucfirst(Auth::user()->first_name) . ' ' .  strtoupper(Auth::user()->middle_name[0]) .'. ' . ucfirst(Auth::user()->last_name) }}
    </li>
    <li class="flex">
        <a href="{{ route("logout") }}" class="w-full text-center py-2 px-10 rounded bg-white hover:bg-slate-200 ease-in-out duration-150">
            Logout
        </a>
    </li>
</ul>