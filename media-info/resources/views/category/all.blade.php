<x-layout>
    <div class="container mt-5">
        <div class="col-lg-5 m-auto ">
          @foreach ($categories as $item)
          <div class="category-c pt-4">
              <div class="" >
                  <div class="image ">
                    <img src="1.png" class="img-fluid" alt="">
                  </div>
                  <div class="category-name col-5 col-lg-5 text-center">
                      <a href="{{ URL::asset('categories/'.$item->id) }} ">{{$item->name}}</a>
                  </div>
              </div>
            </div>
          @endforeach
          
                
                </div>
                </div>
</x-layout>