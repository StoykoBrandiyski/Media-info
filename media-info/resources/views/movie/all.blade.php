<x-layout>
    <div class="container mt-5 ">

        <h2 class="col-lg-3 page-filter">Категория: <span></span> </h2>
  
        <div class="filters col-4 col-lg-4 py-4">
          <form class="form-filter" action="" method="post">
            <select class="form-select " aria-label=".form-select-lg example">
            <option selected>Подреди по</option>
            <option value="1">Най-харесвани</option>
            <option value="2">Най-нови</option>
            <option value="3">Най-</option>
        </select>
        <input class="p-2" type="submit" name="filter" value="Филтрирай">
      </form>
        </div>
    <div class="row ">
      <div class="col ">
  
      <div id="moviesContainer" class="container mx-auto mt-4 top-film ">
  
        @foreach ($movies as $value) 
          <div class="card bg-image hover-zoom">
          <img src="{{ asset('../storage/app/public/' . $value->image) }}" class="card-img-top">
          <div class="card-body">
            <a href="{{ url('movie_page',[$value->id])}}" class="card-title">{{$value->title}}</a>
            <span>4.5</span>
            </div>
        </div>
        @endforeach
       
       <!--
        <div class="card">
          <img src="https://i.imgur.com/ZTkt4I5.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#" class="card-title">Title</a>
          </div>
        </div>-->
    </div>
  
    
      </div>
        </div>
</x-layout>