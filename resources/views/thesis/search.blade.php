@extends('thesis.layout')
@section('content')

<div class="h-full  flex justify-center  flex-col gap-4 bg-white w-[80%] mx-auto p-10 shadow-lg" id="data-container">
  <p id="search" class="hidden">{{$search}}</p>


  <div class="flex flex-col  w-full" data-name="thesis-container">
    <a href="" data-name="thesis-link">
      <h1 class="text-[40px] font-bold text-primary-blue" data-name="thesis-title"></h1>
    </a>
    <div class="flex gap-1">


      <p class=" text-[20px] text-rose-950 font-semibold" data-name="thesis-author_name"></p>
    </div>
    <div class="overflow-hidden ext-ellipsis line-clamp-3  break-words">

      <p class="text-[20px]" data-name="thesis-abstract"></p>
    </div>

  </div>



  <div class="max-w-[400px] self-center grow">


  </div>
</div>
<img src="{{asset('images/dashboard_background.svg')}}" alt="" class="w-full fixed bottom-0 z-[-1]">
<script>
  $(document).ready(function() {
    var page = 0;
    var lastpage = 1;
    var thesisContainer = $('[data-name="thesis-container"]').clone();
    const origThesisContainer = $('[data-name="thesis-container"]').clone();
    fetchData();
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        // Load more data when user scrolls to the bottom
        fetchData()
      }
    });

    function fetchData() {
      if (page >= lastpage) return;
      page += 1;
      const search = $("#search").text();
      console.log(search);
      $.ajax({
        url: `/thesis/json_search?search=${search}`,
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        type: 'GET',
        data: {
          page: page
        },
        success: function(response) {
          // Append fetched data to the container


          const jsonData = response;
          console.log(jsonData.last_page, page);
          lastpage = jsonData.last_page;
          jsonData.data.forEach((thesis) => {

            thesisContainer = origThesisContainer.clone();

            thesisContainer.find('[data-name="thesis-title"]').text(thesis.title);
            thesisContainer.find("a").attr("href", `/thesis/${thesis.id}`);
            thesisContainer.find('[data-name="thesis-abstract"]').text(thesis.abstract);


            thesisContainer.appendTo('#data-container');
            const authors = thesis.authors.map((author) => {
              return `${author.first_name} ${author.middle_name} ${author.last_name}`
            }).join(", ");
            thesisContainer.find('[data-name="thesis-author_name"]').text(authors);

          });


        }
      });

    }
  });
  window.fetchData = fetchData;
  $(document).ready(function() {

    console.log("Helllloo")
    fetchData();
  })
</script>

@endsection('content')