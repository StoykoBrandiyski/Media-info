<x-layout>
    <div class="container mt-5 col-lg-8 border img-container p-3">
        <div class="title text-center p-3">
            <h2>{{$movie->title}} </h2>
        </div>
        <div class="image-movie ">
        <img class="img-fluid mx-auto d-block" width="900" src="{{ asset('../storage/app/public/' . $movie->image) }}">
        </div>
        <div class="information pt-4">
            <div class="p-2">
                <span class="text-danger">##</span><span>Режисьор :</span>
                <span>{{$movie->director}}</span>
            </div>
            <div class="p-2">
                <span class="text-danger">##</span><span>В ролите :</span>
                <span> {{$movie->actors}}
                </span>
            </div>
            <div class="p-2">
                <span class="text-danger">##</span><span>Държава :</span>
                <span>{{$movie->country}}</span>
            </div>
            <div class="p-2">
                <span class="text-danger">##</span><span>Година :</span>
                <span>{{$movie->year}}</span>
            </div>
            <div class="p-2">
                <span class="text-danger">##</span><span>Времетраене :</span>
                <span>{{$movie->duration}}мин.</span>
            </div>
            <div class="p-2">
                <span class="text-danger">##</span><span>Резюме :</span>
                <span> {{$movie->summary}}</span>
            </div>
            <div class="p-2 mt-auto">
                <i class="fa-brands fa-youtube text-danger"></i>
                <a class="btn" target="_blank"
                    href="https://www.youtube.com/results?search_query=Boyka%3A+Undisputed+4+Official+Trailer+">Виж
                    трейлъра</a>
            </div>
        </div>
    </div>
    
    <div class="container mt-5 col-lg-8 border img-container pt-5 pb-5">
    
        <h4 class="text-center text-secondary">
            <a id="showCommentLink" >Покажи коментарите <span class="text-success" id="comment-count">(3)</span></a>
        </h4>
    
        <div class="container-comments">
            <!-- generate comments-->
        </div>
    
        <form action="{{ asset('/addComment')}}" method="POST">
            @csrf
        <div class=" p-2">
            <div class="d-flex ">
            <input type="hidden" name="movie_id" value="{{$movie->id}}"/>
                <textarea class="form-control ml-1 " name="content"></textarea>
            </div>
            <div class="mt-3 ">
                <input class="btn btn-primary btn-sm shadow-none"  type="submit" id="submit-comment" value="Добави коментар">
            </div>
            @error('content')
                <p class="text-center text-danger">{{$message}}</p>
            @enderror
        </div>
        </form>
    
    </div>
    <script id="reader" data-search="{{$movie->id}}" src="{{ URL::asset('../resources/js/read.comments.js') }}" ></script>

    <script id="" data-search="{{$movie->id}}" src="{{ URL::asset('../resources/js/comment-count.js') }}" ></script>

</x-layout>