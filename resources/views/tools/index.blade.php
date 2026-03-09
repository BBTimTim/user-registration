
@extends('layout.main')

@section('title', 'Tools')
    
@section('content')
   
<h3 class="text-center m-5">Eszközök</h3>
<div class="w-25 container mt-3"><a href="{{route ('tools.create') }}" class="btn btn-outline-light m-1 w-100">Hozzáadás</a></div>
<div class="row justify-content-center">
<table class="table table-borderless table-hover table-responsive w-50 p-3 m-5">
    @foreach($tools as $tool)
    <tbody>
        <tr>
            <td>{{ $tool->name }}</td>
            <td><i>
                @foreach ($tool->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </td></i>
            <td> <a href="{{route ('tools.show', $tool->id) }}" class="btn btn-outline-light m-1 w-100">Megjelenítés</a></td>
            <td> <a href="{{route ('tools.edit', $tool->id) }}" class="btn btn-outline-light m-1 w-100">Szerkesztés</a></td>
            <td> <form action="{{route ('tools.destroy', $tool->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger m-1 w-100" onclick="return confirm('Biztosan törölni akarja?')">Törlés</button>
                </form></td>
            @endforeach
        </tr> 
</tbody>
</table>
</div>

@endsection