<x-layout>
        <div class="container col-xs-4 m-auto">
            <h1 class="text-center p-3 ">Редактиране на филм</h1>
            <form class="form-horizontal" autocomplete="on" action="{{ URL::asset('/storeEditMovie') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <input type="hidden" class="form-control" value="{{$movie->id}}" placeholder="" name="movieId">
                    <label class="col-sm-2 col-form-label">Избери категория: </label>
                    <div class="col-sm-4">
                        <select class="form-select" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" 
                                    @if($movie->category_id == $category->id) {{ 'selected' }} 
                                    @endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                          </select>
                    </div>
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Заглавие:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$movie->title}}" placeholder="" name="title">
                    </div>
                    @error('title')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Режисиьор:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="" value="{{$movie->director}}" name="director">
                    </div>
                    @error('director')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Актьори:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$movie->actors}}"  placeholder="" name="actors">
                    </div>
                    @error('actors')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Година:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="" value="{{$movie->year}}" name="year">
                    </div>
                    @error('year')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Страна:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="{{$movie->country}}" placeholder="" name="country">
                    </div>
                    @error('country')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Времетраене:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="" value="{{$movie->duration}}" name="duration">
                    </div>
                    @error('duration')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Трейлър линк:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="" value="{{$movie->trailer_link}}" name="trailer_link">
                    </div>
                    @error('trailer_link')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Резюме: </label>
                    <div class="col-sm-4">
                        <textarea class="form-control rounded-0" maxlength="1000" cols="10" rows="10" name="summary">{{$movie->summary}}</textarea>
                    </div>
                    @error('summary')
                        <p class="text-center text-danger">{{$message}}</p>
                    @enderror
                </div>
        
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Корица:</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" id="customFile" name="image" onchange="readURL(this);" />
                        @error('image')
                            <p class="text-center text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <span class="col-sm-1">.jpg.png</span>
                    <div class="w-25">
                    <img id="blah"
                        height="150"
                        src="{{$movie->image ? asset('../storage/app/public/'.$movie->image) : asset('/images/no-avatar.jpg')}}" 
                        alt="Your image" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <button type="submit" class="bg-light btn ">Редактирай филма</button>
                    </div>
                </div>
        
            </form>
        
        </div>
    <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
            
                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                    };
            
                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
    </x-layout>