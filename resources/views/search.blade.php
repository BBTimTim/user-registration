@extends('layout.main')

@section('title', 'search')
    
@section('content')

    <h3 class="text-center m-5">Találatok listája:</h3>
<div class="row justify-content-center">
<table class="table table-borderless table-hover table-responsive w-50 p-3 m-2">
    <tbody>
    @forelse($list as $item)
        <tr>   
            <td> {{$item->name}}</td>
            <td>{{$item->email}}</td>
        </tr> 
        @empty
       <tr class="text-center"> <td><h4>A keresett kifejezésre nincs találat!</h4></td></tr>
      @endforelse
</tbody>
</table>
</div>

@endsection