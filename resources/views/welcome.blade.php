@extends('layouts.main_layout')
@section('content')
<div class="flex justify-center">
  <div class="flex bg-white flex-col lg:w-[85%] shadow-lg p-5 [&>p]:mt-5 [&>h1]:mt-10 mt-10 shadow-slate-700">
    <h1 class="text-primary-blue text-5xl font-bold mt-10 flex">
      Welcome to the ICpEP
    </h1>
    <h1 class="text-primary-blue text-4xl font-bold mt-5">
      JRU Chapter Online Library System!
    </h1>
    <h1 class="text-primary-yellow text-4xl font-bold">
      About Us
    </h1>
    <p class="text-[25px]">
      An Online Library System of Institute of Computer Engineers of the Philippines. SE - JRU Chapter
      <br>
      ICpEP - JRU Chapter, formerly known as ACES is an academic organization exclusive for Computer Engineering students of Jose Rizal University.
    </p>
    <h1 class="text-primary-yellow text-4xl font-bold">
      JRU Chapter Online Library System!
    </h1>

    <p class="text-[25px]">
      ICpEP - JRU Chapter, formerly known as ACES (Association of Computer Engineering Students), is an academic organization exclusively for Computer Engineering students of Jose Rizal University. With a rich history and a commitment to excellence, ICpEP - JRU Chapter aims to empower its members through academic support, professional development, and community engagement.
    </p>

    <h1 class="text-primary-yellow text-4xl font-bold">
      Key Features
    </h1>
    <ul class="text-[25px] mt-5 ml-5 list-disc">
      <li>Extensive Collection: Explore our extensive collection of digital resources curated specifically for Computer Engineering students.
      </li>
      <li>Easy Access: Access the library anytime, anywhere, from any device with an internet connection.</li>
      <li>Search and Filter: Quickly find the resources you need with our intuitive search and filter functionality.
      </li>
      <li>Personalized Experience: Customize your library experience by creating a personalized profile and saving your favorite resources.
      </li>
      <li>Collaborative Tools: Collaborate with fellow students, share resources, and participate in discussions through our interactive platform.
      </li>
    </ul>
    <h1 class="text-primary-blue text-4xl font-bold">
      Get Started Today!
    </h1>
    <p class="text-[25px]">
      Ready to explore the ICpEP - JRU Chapter Online Library System? Sign up for an account today and start accessing our digital resources, connecting with fellow students, and engaging with the Computer Engineering community at JRU!
    </p>
    <a href="{{ route('register') }}" class="bg-primary-blue text-white px-4 py-2 text-center w-[150px] mt-10 mb-10 rounded ml-auto">Register</a>
  </div>
</div>
<img src="{{asset('images/dashboard_background.svg')}}" alt="" class="w-full fixed bottom-0 z-[-1]">

@endsection('content')