@extends('layouts.main_layout')
@section('content')

<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="flex justify-center w-full">
    <div class="bg-primary-blue fixed flex flex-col h-[500px] w-[400px] items-center mt-20 rounded-lg">
        <img src="{{ asset('images/JRULogo.png') }}" class="w-[200px] h-[200px] absolute top-[-100px]">
        <div class="flex mt-10">
            <h2 class="text-primary-yellow text-[50px] font-bold">Log</h2>
            <span class="w-[20px]"></span>
            <h2 class="text-white text-[50px] font-bold">In</h2>
        </div>

        <div class="">

            <form action="{{ route('login') }}" method="post" class="text-primary-blue font-bold">
                @csrf
                <div class="flex flex-col mt-10">
                    <label for="email" class="text-white">Email</label>
                    <input type="email" name="email" id="email" class="w-[300px] h-[40px] rounded-full ">

                </div>
                <div class="flex flex-col mt-5">
                    <label for="password" class="text-white">Password</label>
                    <input type="password" name="password" id="password" class="w-[300px] h-[40px] rounded-full ">


                </div>
                @error('email')
                <p class="text-red-500">Wrong email and password</p>
                @enderror
                <div class="flex justify-center mt-5">
                    <button type="submit" class="bg-primary-yellow px-[20px] py-1 rounded-full text">Log In</button>
                </div>
            </form>
        </div>

    </div>
</div>
<img src="{{ asset("images/Login_Background.png") }}" alt="" class="absolute z-[-1] w-full bottom-[30%] h-[200px]" height="400">


@endsection('content')