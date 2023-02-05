<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
@if(empty($userMovies))
    <div>
        <p class="text-center text-white fw-bold ">Все още няма качени филми</p>
    </div>
@else
<div class="splide">
    <div class="splide__track">
        <div class="splide__list">
            @foreach ($userMovies as $value) 
                <div class="col-sm-4 splide__slide m-2">
                    <div class="card bg-white text-dark">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ url('movie_page',[$value->id])}}" class="card-title">{{$value->title}}</a>
                            </h5>
                            <p class="card-text">
                                <img src="{{ asset('../storage/app/public/' . $value->image) }}" class="card-img-top">
                            <p class="card-text">
                                <span>Действия:</span>
                                <a href="{{ url('edit',[$value->id])}}" title="Редактирай"><i class="fa fa-pencil text-success" aria-hidden="true"></i></a>
                                <a href="{{ url('disableMovie',[$value->id])}}" title="Скрий филма"><i class="fa fa-ban text-danger" aria-hidden="true"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
              @endforeach
        </div>
    </div>
</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide', {
                type: 'loop',
                perPage: 4,
                rewind: true,
                breakpoints: {
                    640: {
                        perPage: 3,
                        fixedWidth : '10rem',
                        fixedHeight: '6rem',
                        gap: '1rem'
                    },
                    480: {
                        perPage: 1,
                        gap: '.7rem',
                        height: '12rem',
                    },
                },
            });
            splide.mount();
</script>