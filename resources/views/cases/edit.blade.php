@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atuliazar um caso</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('cases.update', $cases->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ $cases->name }}" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $cases->email }} />
            </div>
            <div class="form-group">
                <label for="age">Idade:</label>
                <input type="text" class="form-control" name="age" value={{ $cases->age }} />
            </div>
            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" name="city" value="{{ $cases->city }}" />
            </div>
            <div class="form-group">
                <label for="region">Bairro:</label>
                <input type="text" class="form-control" name="region" value="{{ $cases->region }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection