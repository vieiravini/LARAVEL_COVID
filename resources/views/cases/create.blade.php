@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Registrar um caso</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cases.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Nome:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="age">Idade:</label>
              <input type="text" class="form-control" name="age"/>
          </div>
          <div class="form-group">
              <label for="city">Cidade:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="region">Bairro:</label>
              <input type="text" class="form-control" name="region"/>
          </div>                         
          <button type="submit" class="btn btn-primary">Registar</button>
      </form>
  </div>
</div>
</div>
@endsection