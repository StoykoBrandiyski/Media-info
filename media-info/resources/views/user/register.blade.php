<x-layout>
    
    <div class="register-wrap"> 
      <div class="d-flex justify-content-center">
      <a class="p-3 fw-bold" href="{{ URL::asset('/login') }}">Вход</a>
      <a class="p-3 fw-bold" href="#">Регистрация</a>
  
      </div>
      <form action="{{ URL::asset('/users') }}" method="Post">
        @csrf
        @error('error')
          <p class="text-center text-danger">{{$message}}</p>
        @enderror
      <div class="form-outline m-3 w-75 mx-auto">
        @error('username')
          <p class="text-center text-danger">{{$message}}</p>
        @enderror
        <input type="text" name="username"  value="{{old('username')}}" class="form-control" />
        <label class="form-label fst-italic" for="form2Example1">Потребител</label>
      </div>
    
      <!-- Password input -->
      <div class="form-outline m-3 w-75 mx-auto">
         
        <input type="password" name="password"  class="form-control" />
        <label class="form-label fst-italic" for="password">Парола</label>
        @error('password')
        <p class="text-center text-danger">{{$message}}</p>
        @enderror
      </div>
    
      <div class="form-outline m-3 w-75 mx-auto">
          @error('email')
          <p class="text-center text-danger">{{$message}}</p>
          @enderror
        <input type="email" name="email"  value="{{old('email')}}" class="form-control" />
        <label class="form-label fst-italic" for="email">Поща</label>
      </div>

      <div class="form-outline m-3 w-75 mx-auto">
        <label class="form-label fst-italic" for="gender"  value="{{old('gender')}}"class="label">Пол</label>
            <select name="gender">
              <option value="male">Мъж</option>
              <option value="female">Жена</option>
            </select>
      </div>
      
      <div class="form-outline m-3 w-75 mx-auto">
         @error('age')
          <p class="text-center text-danger">{{$message}}</p>
          @enderror
        <input type="number" name="age" value="{{old('age')}}" class="form-control" />
        <label class="form-label fst-italic" for="age">Години</label>
      </div>

      <div class="form-outline m-3 w-75 mx-auto">
          @error('country')
          <p class="text-center text-danger">{{$message}}</p>
          @enderror
        <input type="text" class="form-control" name="country" value="{{old('country')}}" />
        <label class="form-label fst-italic" for="country">Страна</label>
      </div>

      <!-- Submit button -->
      <div class="form-outline m-3 w-75 mx-auto">
        <button type="submit" class="btn btn-primary btn-block w-100 ">Вход</button>
      </div>
    </form>
    </div>
  </x-layout>