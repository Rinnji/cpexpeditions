@extends('layouts/main_layout')
@section('content')




<div class="main flex w-full justify-center flex-col items-center">
    <div class="flex text-[20px] font-bold md:text-[50px] lg:text-[100px]">
        <h1 class="text-primary-blue">CPE</h1>
        <h1 class="text-primary-yellow">xpeditions</h1>
    </div>

    <form class="search-bar" method="GET" action="{{ route('thesis.search') }}">
        <img src="{{ asset('images/Search.png') }}" alt="" class="">
        <input type="text" name="search" oninput="searchThesis('search-input')" id="search-input" />
        <button></button>
        <ul class="flex bg-white flex-col w-full absolute top-[85px] font-bold shadow shadow-slate-500 hidden" id="search-dropdown">
            <li id="search-item">
                <a href="" class="p-2 text-primary-blue hover:bg-primary-blue-hover hover:text-white flex w-full">
                    Search
                </a>
            </li>
        </ul>
    </form>

</div>
<img src="{{asset('images/dashboard_background.svg')}}" alt="" class="w-full fixed bottom-0 z-[-1]">

@endsection('content')