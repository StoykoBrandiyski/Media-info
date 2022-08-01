<x-layout>
    
  <div class="login-wrap"> 
    <div class="d-flex justify-content-center">
    <a class="p-3 fw-bold" href="#">Вход</a>
    <a class="p-3 fw-bold" href="{{ URL::asset('/register') }}">Регистрация</a>

    </div>
    <form action="{{ URL::asset('/users/authenticate') }}" method="POST">
      @csrf
      @if($errors->any())
          <h4>{{$errors->first()}}</h4>
      @endif
    <div class="form-outline m-3 w-75 mx-auto">
      <input type="text" name="username"  value="{{old('username')}}" class="form-control" />
      <label class="form-label fst-italic" for="form2Example1">Потребител</label>
      @error('username')
        <p class="text-center text-danger">{{$message}}</p>
      @enderror
    </div>
  
    <div class="form-outline m-3 w-75 mx-auto">
      <input type="password" name="password" class="form-control" />
      <label class="form-label fst-italic" for="form2Example2">Парола</label>
      @error('password')
        <p class="text-center text-danger">{{$message}}</p>
      @enderror
    </div>
  
    <div class="form-outline m-3 w-75 mx-auto">
      <button type="submit" class="btn btn-primary btn-block w-100 ">Вход</button>
    </div>
  </form>
  </div>
</x-layout>