@extends('thesis.layout')
@section('content')

<div class="ml-10 h-full  flex justify-center  flex-col">

  @foreach ($theses as $thesis)
  <div class="flex flex-col w-full">
    <a href="{{ route('thesis.show' , $thesis) }}">
      <h1 class="text-[40px] font-bold text-primary-blue">{{ $thesis->title }}</h1>
    </a>
    <div class="flex gap-1">

      @foreach($thesis->authors as $author)

      <p class="text-accent-green  text-[20px]">{{ $author->first_name[0] . '.' . $author->middle_name[0] . '.' . $author->last_name }}</p>
      @if(!$loop->last)
      <p class="text-accent-green  text-[20px]">,</p>
      @endif
      @endforeach
    </div>
    <div class="overflow-hidden ext-ellipsis line-clamp-3  break-words">

      <p class="text-[20px]">{{ $thesis->abstract }}</p>
    </div>

  </div>
  @endforeach


  <div class="max-w-[400px] self-center grow">

    {{ $theses->onEachSide(2)->links() }}
  </div>
</div>
<img src="{{asset('images/dashboard_background.svg')}}" alt="" class="w-full fixed bottom-0 z-[-1]">

@endsection('content')