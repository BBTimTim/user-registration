
@extends('layout.main')

@section('title', 'Profil')
    
@section('content')
        <div class="container col-md-8">
          <div class="row gy-3">
        <h2 class="text-center mt-5">Profilom</h2>
       <div class="col-12 text-center mt-5"> Belépve mint: {{ Auth::user()->name }} <br> <a href="/logout">Kilépés</a> </div>
      </div>
    </div>
    
    
@endsection