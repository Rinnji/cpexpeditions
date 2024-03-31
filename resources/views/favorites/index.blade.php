@extends('thesis.layout')
@section('content')
<div class="flex flex-col justify-center items-center">
  <h1 class="text-4xl text-center mt-5 mb-10 text-primary-blue font-extrabold">
    Favorites
  </h1>
  <div class="grid grid-cols-1 gap-4 lg:w-[80%]">
    @foreach($favorites as $favorite)
    <div class="bg-white p-4 rounded border-2 shadow-lg">
      <a href="{{ route('thesis.show', $favorite) }}" class=" text-2xl font-bold text-primary-blue">
        {{ $favorite->title }}
      </a>
      <div class="flex">
        @foreach($favorite->authors as $author)
        <p class="text-lg">{{ $author->first_name[0] . '.' . $author->middle_name[0] . '.' . $author->last_name }}</p>
        @if(!$loop->last)
        <p class="text-lg">,</p>
        @endif
        @endforeach
      </div>
      <p class="text-lg"><strong>Date Published: </strong>{{ date("F j, Y", strtotime($favorite->date_published)) }}</p>

    </div>
    @endforeach
  </div>
  @endsection('content')