<!Doctype html>
<head>
  <title>Media-Info</title>
  <meta charset="utf-8">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<link rel="stylesheet" href="{{ URL::asset('../resources/css/app.css') }}">

  
</head>
<body>
<div class="container-lg mt-3 ">
  <header>
  <div class="d-flex justify-content-between p-2  border rounded-top">
    <div class="clock col-3">
      Часът е : <span id="clock-time"></span>
      <a href="#">BG</a>
      <a href="api/langchange.php?lang=en">EN</a>
      
    </div>
    
    <div class="d-flex">
      @auth
       <a href="{{ URL::asset('/add') }}" class="p-2" id="add-movie">Добави филм</a>
       <span class="p-2">Здравей,</span> <a class="p-2" href="{{ URL::asset('/editUser') }}"> {{auth()->user()->username}} </a> 
       <form class="inline" method="POST" action="{{ URL::asset('/logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary p-2 ">
          <i class="fa-solid fa-door-closed"></i> Exit
        </button>
      </form>
       @else
       <a href="{{ URL::asset('/login') }}" class="btn btn-outline-secondary">Вход</a>
      
      @endauth
    </div>

  </div>
  <div class="">
    <img class="img-fluid" src="{{asset('images/banner-min.jpg')}}">
  </div>
  </header>
    <nav class="navbar navbar-expand-sm rounded-bottom">
      <div class="container-fluid myNav">
        <ul class="navbar-nav">
          <li class="nav-item pl-5">
            <a class="nav-link active" href="{{URL::asset('/')}}"><span><i class="fas fa-home"></i></span> Начало</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::asset('/categories') }}"><span><i class="fa-solid fa-film"></i></span>Жанрове</a>
          </li>
        </ul>
      </div>
    </nav>

    <main>
      {{$slot}}
    </main>
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Footer</p>
        <p>Support from Full Stack Developer - Stoyko </p>
      </div>
    </div>
    
    <x-flash-message />
  
    <script src="{{ asset('../resources/js/live-clock.js') }} "></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>