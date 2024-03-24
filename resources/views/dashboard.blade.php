@extends('layouts/main_layout')
@section('content')




<div class="main flex w-full justify-center flex-col items-center">
    <div class="flex text-[20px] md:text-[50px] lg:text-[100px]">
        <h1 class="text-primary-blue">CP</h1>
        <h1 class="text-primary-yellow">Expedition</h1>
    </div>

    <form class="search-bar" method="GET" action="{{ route('thesis.search') }}">
        <img src="{{ asset('images/Search.png') }}" alt="" class="">
        <input type="text" name="search" />
        <button></button>

    </form>
</div>
<img src="{{asset('images/dashboard_background.svg')}}" alt="" class="w-full fixed bottom-0 z-[-1]">

@endsection('content')