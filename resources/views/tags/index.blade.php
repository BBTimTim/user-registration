
@extends('layout.main')

@section('title', 'Tags list')
    
@section('content')

<h3 class="m-5 text-center">Címkék</h3>
<div class="w-25 container mt-3"><a href="{{route ('tags.create') }}" class="btn btn-outline-light m-1 w-100">Hozzáadás</a></div>

 <div class="m-5 row justify-content-center">
    <table class="table table-hover table-borderless table-responsive w-50 p-3 m-2">
        @foreach($tags as $tag)
        <tbody>
            <tr>
              <td> {{ $tag->name }} </td>
                <td> <a href="{{route ('tags.edit', $tag->id) }}" class="btn btn-outline-light m-1  w-100">Szerkesztés</a></td>
               <td> <form action="{{route ('tags.destroy', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger m-1  w-75" onclick="return confirm('Biztosan törölni akarja?')">Törlés</button>
                </form></td>
    @endforeach
</tr>
</tbody>
</div>
    
@endsection