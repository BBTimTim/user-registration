    @extends('layout.main')

    @section('title', 'Lépj be')
        
@section('content')
<form action="/login-process" method="POST" class="container col-md-8 col-lg-4 mt-5">

  @csrf
  
 <h2 class="text-center">Belépés</h2>
 <div class="row gy-3">

  <div class="col-12">
      <input type="text" name="email" autocomplete="new-password" placeholder="Add meg az email címed" 
      class="form-control" value="{{ old('email')}}">
  </div>

  <div class="col-12">
      <input type="password" name="password" autocomplete="new-password" placeholder="Add meg a jelszavad" 
      class="form-control">
  </div>

  <div class="col-12">
    <div class="form-check">
      <input type="checkbox" name="remember" id="remember" class="form-check-input">
      <label for="remember" class="form-check-label">Emlékezz rám</label>
   </div>
 </div>

  <div class="col-12 text-center">
      <button type="submit" class="btn btn-outline-light">Belépés</button>
  </div>
 </div>
</form>

@endsection

    