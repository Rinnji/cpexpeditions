@extends('layouts/main_layout')
@section('content')
<div class="flex justify-center width-screen">
  <form action="{{ route('thesis.store') }}" method="POST" class="bg-neutral-100 p-5 flex-col [&>input]:shadow [&>input]:shadow-black  [&>textarea]:shadow [&>textarea]:shadow-black flex w-[80%] shadow-lg shadow-primary-blue rounded my-10">
    @csrf
    <div class="flex gap-3 justify-center">
      <h1 class="text-primary-blue text-[40px] ">Add </h1>
      <h1 class="text-primary-yellow text-[40px]">Thesis</h1>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px]">Title:</h1>
      <input type="text" class="rounded" name="title" required>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px]">Publish Date:</h1>
      <input type="date" class="rounded" name="date_published" required>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px] mt-4">Abstract</h1>
      <textarea cols="30" rows="10" class="rounded" name="abstract"></textarea>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px] mt-4">Summary of Findings:</h1>
      <textarea class="rounded min-h-[400px] text-nowrap overflow-scroll" name="summary_of_findings" required></textarea>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px] mt-4">Conclusion:</h1>
      <textarea class="rounded min-h-[200px] text-nowrap overflow-scroll" name="conclusion" required></textarea>
    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px] mt-4">Recommendations:</h1>
      <textarea class="rounded min-h-[200px] text-nowrap overflow-scroll" name="recommendations" required></textarea>
    </div>

    <div class="flex text-primary-blue">
      <label for="" class=" font-bold text-[20px]">Authors:</label>
      <button onclick="addAuthor()" type="button">
        <span class="material-symbols-outlined text-[30px]">add</span>
      </button>
    </div>

    <div id="authors">
      <div class="flex gap-3 [&>input]:rounded [&>input]:shadow  mt-4 authors-input py-2 items-center" id="author-div-1">
        <input type="text" name="first_name[]" placeholder="First Name">
        <input type="text" name="middle_name[]" placeholder="Middle Name">
        <input type="text" name="last_name[]" placeholder="Last Name">
        <button type="button" class="shadow bg-red-500 shadow-black rounded h-[30px]"><span class="material-symbols-outlined text-[30px] text-white font-bold">remove</span></button>
      </div>


    </div>
    <div class="flex flex-col">
      <h1 class="text-primary-blue font-bold text-[20px] mt-4">Adviser:</h1>
      <input type="text" name="adviser" placeholder="adviser">
    </div>
    <div class="flex flex-col">
      <label for="" class="text-primary-blue font-bold text-[20px] mt-4">School year</label>
      <div class="flex gap-2 items-center">
        <input type="number" name="start_school_year" min="1900" max="2099" step="1" value="2024" class="rounded shadow p-1" />
        <p>-</p>
        <input type="number" name="end_school_year" min="1900" max="2099" step="1" value="2024" class="rounded shadow p-1" />

      </div>
    </div>
    <button class="p-2 bg-primary-yellow text-white w-40 float-end ml-auto" type="submit">Submit</button>
    @if($errors->any())
    <div class="alert alert-danger text-red-500">
      <strong>Whoops</strong> There were some problems with your input. <br> <br>

    </div>
    @endif

  </form>
</div>
<script>
  function addAuthor() {
    authorDiv = document.getElementById('author-div-1');
    authorsDiv = document.getElementById('authors');
    newAuthorDiv = authorDiv.cloneNode(true);
    newAuthorDiv.id = "author-div-" + (document.getElementsByClassName('authors-input').length + 1);
    newAuthorDiv.querySelector('button').setAttribute('id', "button" + newAuthorDiv.id);
    newAuthorDiv.querySelector('button').setAttribute('onclick', "removeAuthor('" + newAuthorDiv.id + "')");

    authorsDiv.appendChild(newAuthorDiv);
  }

  function removeAuthor(id) {
    authorDiv = document.getElementById(id);
    authorDiv.remove();
  }
</script>
@endsection('content')