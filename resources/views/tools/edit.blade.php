
@extends('layout.main')

@section('title', 'Tools edit')

@section('content')

@error('name')
<div class="alert alert-warning col-12 text-center container col-md-8 col-lg-4 mt-5">{{$message}}</div>
@enderror  

<h3 class="text-center m-5">"{{$tool->name }}" adatainak módosítása:</h3>
 <div class="container mt-5">
    <form action="{{route ('tools.update', $tool->id) }}" method="POST" class="container col-md-8 col-lg-4 mt-5">
        @csrf
        @method('PUT')
        <div class="row gy-3">
         <label for="name">Termék neve:</label>
         <input type="text" name="name" class="form-control input-lg" id="name" value="{{ old('name', $tool->name)}}">
        
         <label for="category_id">Kategória:</label>
         <select class="form-control input-lg" name="category_id" id="category_id">
             @foreach ($categories as $category)
                 <option value="{{old('category_id',$category->id)}}">{{old('name',$category->name)}}</option>
             @endforeach
         </select>

         <label for="description">Részletek:</label>
         <textarea type="text" name="description" class="form-control input-lg" style="height: 120px;" id="description">{{ old('description', $tool->description)}}</textarea>
         
         <label for="price">Ár: Ft</label>
         <input type="number" name="price" class="form-control input-lg" id="price" value="{{ old('price', $tool->price)}}">

        <button type="submit" class="btn btn-outline-light mt-4">Mentés</button>
        <a href="{{route ('tools.index') }}" type="button" class="btn btn-outline-secondary mb-4 w-25">vissza</a>
        </div>
    </form>
</div>

@endsection