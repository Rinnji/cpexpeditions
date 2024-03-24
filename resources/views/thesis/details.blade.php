@extends('thesis.layout')
@section('content')
<div class="flex w-full justify-center">

  <div class="flex flex-col justify-center p-10 gap-4 max-w-[1000px]" x-data="{show:true}" x-init="setTimeout(() => show = false, 5000)">
    @if(session('status') == 'favorite-added')
    <div id="status-message" class="bg-green-400 text-white p-2 rounded flex justify-between items-center border-2 border-green-500" x-show="show">
      <p>Thesis added to favorites</p>
      <button type="button" onclick="onClose('status-message')"><span class="material-symbols-outlined">close</span></button>
    </div>
    @elseif(session('status') == 'favorite-exists')
    <div id="status-message" class="bg-red-400 text-white p-2 rounded flex justify-between items-center border-2 border-red-500" x-show="show">
      <p>Thesis already in favorites</p>
      <button type="button" onclick="onClose('status-message')"><span class="material-symbols-outlined">close</span></button>
    </div>
    @endif

    <form action="{{ route('favorites.store') }}" method="post" class="fixed bottom-5 right-5">
      @csrf
      <input type="number" name="thesis_id" value="{{ $thesis->id }}" hidden>
      <button type="submit" class="bg-primary-yellow text-white p-2 rounded flex justify-center"><span class="material-symbols-outlined">star</span></button>
    </form>
    <h1 class="text-5xl font-bold text-primary-blue">
      {{ $thesis->title }}
    </h1>
    <div class="flex">
      @foreach($thesis->authors as $author)

      <p class="  text-2xl">{{ $author->first_name[0] . '.' . $author->middle_name[0] . '.' . $author->last_name }}</p>
      @if(!$loop->last)
      <p class="  text-4xl">,</p>
      @endif
      @endforeach
    </div>
    <p class="text-xl"><strong>Date Published: </strong>{{ date("F j, Y", strtotime($thesis->date_published)) }}</p>
    <div class="">
      <h2 class="font-bold text-4xl">Abstraction</h2>
      <p class="text-lg text-justify ">{{ $thesis->abstract }}</p>
    </div>
    <div class="">
      <h2 class="font-bold text-4xl">Body</h2>
      <p class="text-lg  text-justify ">{{ $thesis->body }}</p>
    </div>
  </div>
</div>

@endsection('content')