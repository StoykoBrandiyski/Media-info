<x-layout>
    <section class="mybackground-color">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <div class="pb-4">
                     <img src="{{$user->avatar ? asset('../storage/app/public/'.$user->avatar) : asset('/images/no-avatar.jpg')}}" alt="avatar"
                      class="rounded-circle img-fluid" id="avatar" style="width: 150px;">
                  </div>        
                <h5 class="my-3">{{$user->username}}</h5>
                  <p class="text-muted mb-1">{{$user->country}}</p>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body ">
                   <p class="mb-4 text-center">Your statistics</p>
                      <div class="d-flex justify-content-between pb-2">
                          <h5 class="mb-1" style="font-size: .77rem;">Count uploded movies:</h5>
                          <span>25</span>
                      </div>
                      <div class="d-flex justify-content-between pb-2">
                          <h5 class="mb-1" style="font-size: .77rem;">Liked movies:</h5>
                          <span>54</span>
                      </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                <h2 class="text-center p-2">Edit your profile</h2>
                  <form action="{{ URL::asset('/storeEditUser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="username">Потребител</label>
                    </div>
                    <div class="col-sm-9">
                     <input type="text" name="username" class="form-control"  value="{{$user->username}}" disabled/>
                     @error('username')
                     <p class="text-center text-danger">{{$message}}</p>
                     @enderror
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="email">Поща</label>
                    </div>
                    <div class="col-sm-9">
                     <input type="email" name="email" class="form-control"  value="{{$user->email}}"/>
                     @error('email')
                     <p class="text-center text-danger">{{$message}}</p>
                     @enderror
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="username">Пол</label>
                    </div>
                    <div class="col-sm-9">
                     <select name="gender">
                          <option value="male">Мъж</option>
                          <option value="female">Жена</option>
                      </select>
                    </div>
                   </div>
                   <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="country">Страна</label>
                    </div>
                    <div class="col-sm-9">
                     <input type="text" name="country" class="form-control" value="{{$user->country}}" />
                     @error('country')
                     <p class="text-center text-danger">{{$message}}</p>
                     @enderror
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="age">Години</label>
                    </div>
                    <div class="col-sm-9">
                     <input type="number" name="age" min="18" max="85" class="form-control" value="{{$user->age}}" />
                     @error('age')
                     <p class="text-center text-danger">{{$message}}</p>
                     @enderror
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <label class="fst-italic" for="age">Аватар</label>
                    </div>
                    <div class="col-sm-9">
                      <input name="avatar" type="file" onchange="readURL(this);" />
                    </div>
                  </div>
                  <hr>
                  <div class="row justify-content-end">
                    <div class="col-sm-3 ">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>            
            </div>
          </div>
        </div>
      </section>
      <script>
        function readURL(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
               
               reader.onload = function(e) {
                   $('#avatar')
                       .attr('src', e.target.result);
               };
               reader.readAsDataURL(input.files[0]);
           }
       }
       
       </script>      
</x-layout>