@extends('base')


@section('main')

<style>

  td{
    padding: 10px !important;
    vertical-align: middle !important;
  }

</style>

<div class="row">
  <div class="col-sm-12">

        @if(session()->get('success'))
          <div style="margin: 20px 0 20px 0;" class="alert alert-success">
          {{ session()->get('success') }}  
        @endif
          </div>


    <h1 class="display-3">Casos registrados</h1>    
    <table class="table table-hover">
      <thead class="thead-dark"">
          <tr>    
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Idade</th>
            <th scope="col">Cidade</th>
            <th scope="col" >Bairro</th>
            <th scope="col" colspan = 2>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach($cases as $case)
          <tr>
              <td scope="row">{{$case->id}}</td>
              <td>{{$case->name}}</td>
              <td>{{$case->email}}</td>
              <td>{{$case->age}}</td>
              <td>{{$case->city}}</td>
              <td>{{$case->region}}</td>
              <td>
                  <a href="{{ route('cases.edit',$case->id)}}" class="btn btn-primary" ><i class="far fa-edit"></i></a>
              </td>
              <td>
                  <form class="m-0" action="{{ route('cases.destroy', $case->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div>
      <a style="margin: 20px 0 20px 0;" href="{{ route('cases.create')}}" class="btn btn-primary">Adicionar novo caso</a>
    </div>
  <div>
</div>
@endsection
