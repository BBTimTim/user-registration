

@extends('layout.main')

@section('title', 'Tool details')
    
@section('content')
 <div class="container col-md-8 col-lg-4 mt-5 text-center">
    <h1>{{$tool->name }}</h1>
    <h2>Kategória: {{$tool->category->name }}</h2>
    <p>Részletek: {{$tool->description }}</p>
    <small>{{$tool->price }} Ft</small>

    <p><i>
      @foreach ($tool->tags as $tag)
          {{$tag->name}}
      @endforeach
    </p></i>

   <div><a href="{{route ('tools.index') }}" type="button" class="btn btn-outline-secondary mt-4 w-25">vissza</a></div> 
</div>

@endsection