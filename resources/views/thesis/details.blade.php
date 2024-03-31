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


    <h1 class="text-5xl font-bold text-primary-blue">
      {{ $thesis->title }}
    </h1>
    <div class="flex ">
      @foreach($thesis->authors as $author)

      <p class="  text-2xl">{{ strtoupper($author->first_name[0]) . '.' . strtoupper($author->middle_name[0]) . '.' .  ucfirst($author->last_name ) }}</p>
      @if(!$loop->last)
      <p class="  text-4xl">,</p>
      @endif
      @endforeach
    </div>

    <div class="flex flex-col">
      <p class="text-xl">{{ date("F j, Y", strtotime($thesis->date_published)) }}</p>
      <p class="text-xl">{{ Date("Y", strtotime($thesis->start_schoolyear)) ."-".  Date("Y", strtotime($thesis->end_schoolyear))}}</p>
      <p class="text-xl">{{ "Adviser: " . $thesis->adviser }}</p>
    </div>
    <div class="">
      <h2 class="font-bold text-4xl">Abstract</h2>
      <br>
      <p class="text-lg text-justify ">{{ $thesis->abstract }}</p>
    </div>
    <div class="">
      <h2 class="font-bold text-4xl">Summary Of Findings</h2>
      <br>
      <p class="text-lg  text-justify ">{{ $thesis->summary_of_findings }}</p>
    </div>
    <div class="">
      <h2 class="font-bold text-4xl">Conclusion</h2>
      <br>
      <p class="text-lg  text-justify ">{{ $thesis->conclusion }}</p>
    </div>
    <div class="">
      <h2 class="font-bold text-4xl">Recommendations</h2>
      <br>
      <p class="text-lg  text-justify ">{{ $thesis->recommendations}}</p>
    </div>
  </div>
</div>
<div class="fixed bottom-5 right-5 flex gap-3">

  <form action="{{ route('favorites.store') }}" method="post" class="">
    @csrf
    <input type="number" name="thesis_id" value="{{ $thesis->id }}" hidden>
    <button type="submit" class="bg-primary-yellow text-white p-2 rounded flex justify-center"><span class="material-symbols-outlined">star</span></button>
  </form>
  @if(Auth::user()->is_admin == 1)
  <form action="{{ route('thesis.destroy', $thesis->id) }}" method="POST" class="">
    @method("DELETE")
    @csrf
    <input type="number" name="thesis_id" value="{{ $thesis->id }}" hidden>
    <button type="submit" class="bg-red-500 text-white p-2 rounded flex justify-center" title="Delete this thesis"><span class="material-symbols-outlined">delete</span></button>
  </form>
  @endif
</div>

@endsection('content')