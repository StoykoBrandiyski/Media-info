<x-layout>

    <div class="container-md mt-3 ">
    <div class="row ">
        <div class="col-sm-3 col-md-4 col-lg-3 rounded category ">
            <h4 class="text-secondary">Жанрове </h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories',['action'])}}">Екшън</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories',['comedy'])}}">Комедия</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories',['fantasy'])}}">Фантастика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['horror'])}}">Ужаси</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['adventure'])}}">Приключенски</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['drama'])}}">Драма</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['thriller'])}}">Трилър</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['animation'])}}">Анимации</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('categories',['western'])}}">Уестърн</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>

        <div class="col ">
            <div class="d-flex justify-content-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/hPNBoL08tYI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <h2 class="text-color text-center">Наскоро добавени филми</h2>

            <div class="container mx-auto mt-4 top-film ">
        @foreach ($movies as $movie)
            
     <div class="card">
        <img src="{{ asset('../storage/app/public/' . $movie->image)}}" class="card-img-top">
        <div class="card-body">
          <a href="{{ url('movie_page',[$movie->id])}}" class="card-title">{{$movie->title}}</a>
        </div>
      </div>
      @endforeach

            </div>
        </div>
    </div>
</div>


</x-layout>