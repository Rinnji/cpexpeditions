@extends('layouts.main_layout')
@section('content')



<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="flex justify-center w-full">
    <div class="bg-primary-blue fixed flex flex-col  items-center mt-20 rounded-lg " style="padding:2rem;">
        <img src="{{ asset('images/JRULogo.png') }}" class="w-[200px] h-[200px] absolute top-[-100px]">
        <div class="flex mt-10">
            <h2 class="text-primary-yellow text-[50px] font-bold">Create</h2>
            <span class="w-[20px]"></span>
            <h2 class="text-white text-[50px] font-bold">Account</h2>
        </div>

        <div class="">

            <form action="{{ route('register') }}" method="post" class="text-primary-blue font-bold">
                @csrf
                <div class="grid grid-cols-3 gap-10">

                    <div class="flex flex-col ">
                        <label for="first_name" class="text-white">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="middle_name" class="text-white">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="last_name" class="text-white">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>



                    <div class="flex flex-col ">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" name="email" id="email" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" name="password" id="password" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="flex flex-col ">
                        <label for="password_confirmation" class="text-white">Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-[300px] h-[40px] rounded-full ">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex justify-center mt-10">
                    <button type="submit" class="bg-primary-yellow px-[30px] py-1 rounded-full text">Register</button>
                </div>
            </form>
        </div>

    </div>
</div>





@endsection('content')