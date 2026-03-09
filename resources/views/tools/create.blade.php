
@extends('layout.main')

@section('title', 'Tools')
    
@section('content')

<h3 class="text-center m-3">Új eszköz hozzáadása</h3>

@if ($errors->any())
   <div class="alert alert-success col-12 text-center container col-md-8 col-lg-4 mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
   </div>   
@endif

 <form action="{{route ('tools.store') }}" method="POST" class="container col-md-8 col-lg-4 mt-5">
    @csrf
    <div class="row gy-3 m-4">
     <input type="text" name="name" class="form-control input-lg mt-3" id="name" placeholder="Eszköz megnevezése">
  
    <label for="category_id">Kategória</label>
    <select class="form-control input-lg" name="category_id" id="category_id">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <textarea class="form-control input-lg mt-3" name="description" id="description" cols="30" rows="10" placeholder="Leírás..."></textarea>

   <label for="link">Ár Ft-ban</label>
   <input class="form-control input-lg" type="number" name="price" id="price">

   <label for="tags">Címke</label>
   <select class="form-control input-lg" name="tags[]" id="tags" multiple>
       @foreach ($tags as $tag)
           <option value="{{$tag->id}}">{{$tag->name}}</option>
       @endforeach
   </select>

    <button type="submit" class="btn btn-outline-light mt-4">Mentés</button>
    <a href="{{route ('tools.index') }}" type="button" class="btn btn-outline-secondary mt-4 w-25">vissza</a>
    </div>
</form>


@endsection