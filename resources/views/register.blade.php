
@extends('layout.main')

@section('title', 'Regisztráció')
    
@section('content')

      <form action="/register-process" method="POST" class="container col-md-8 col-lg-4 mt-5">

        @csrf
       <h2 class="text-center">Regisztráció</h2>
       <div class="row gy-3">
        <div class="col-12">
            <input type="text" name="name" placeholder="Add meg a neved" 
            class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}">
        
              @error('name')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
        </div>

        <div class="col-12">
            <input type="text" name="email" placeholder="Add meg az email címed" 
            class="form-control @error('email') is-invalid @enderror" value="{{ old('email')}}">
              @error('email')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
        </div>

        <div class="col-12">
            <input type="password" name="password" placeholder="Add meg a jelszavad" 
            class="form-control @error('password') is-invalid @enderror">
              @error('password')
              <span class="invalid-feedback">{{$message}}</span>
              @enderror
        </div>

        <div class="col-12">
            <input type="password" name="password_confirmation" placeholder="Add meg a jelszavad ismét" 
            class="form-control">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-outline-light">Regisztráció</button>
        </div>
       </div>
      </form>
      
      @endsection
 