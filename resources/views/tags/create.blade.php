
@extends('layout.main')

@section('title', 'Categories list')
    
@section('content')

@error('name')
<div class="alert alert-warning col-12 text-center container col-md-8 col-lg-4 mt-5">{{$message}}</div>
@enderror

<h3 class="text-center m-5">Új Címke hozzáadása</h3>
 <form action="{{route ('tags.store') }}" method="POST" class="container col-md-8 col-lg-4 mt-5">
    @csrf
    <div class="row gy-3">
     <input type="text" name="name" class="form-control input-lg mt-3" id="name" placeholder="Címke megnevezése">
   
    <button type="submit" class="btn btn-outline-light mt-4">Mentés</button>
  <a href="{{route ('tags.index') }}" type="button" class="btn btn-outline-secondary mt-4 w-25">vissza</a>
    </div>
</form>

@endsection