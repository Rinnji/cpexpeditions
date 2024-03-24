@extends('layouts.main_layout')
@section('content')
<div class="flex justify-center">
  <div class="w-[50%]">
    <h1 class="text-primary-blue text-[50px] font-bold mt-10">
      Welcome to CPExpedition: Your Thesis Hub
    </h1>
    <p class="text-[20px] mt-10">At CPExpedition, we believe that knowledge should be accessible to all. Our platform serves as a digital library, meticulously curated to showcase groundbreaking theses from various disciplines. Whether you're a student, researcher, or simply curious, CPExpedition provides a treasure trove of intellectual exploration. Dive into thought-provoking research, gain insights, and contribute to the academic discourse—all in one place.</p>
    @auth
    {{ Auth::user()->is_admin == 1 ? "Admin" : "Not" }}
    @endif
  </div>
</div>

@endsection('content')