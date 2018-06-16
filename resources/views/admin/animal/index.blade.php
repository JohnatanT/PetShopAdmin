@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Animais</h1>
    <a href=" {{ route('animal-create') }} " class="btn btn-primary"><i class=" fa fa-plus-circle"></i> Cadastrar</a>
@stop

@section('content')
@include('includes')
<table class="table">
    <thead>
      <tr class="success">
        <th scope="col">ID</th>
        <th scope="col">Raça</th>
        <th scope="col">Preço</th>
        <th scope="col">Descrição</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach($animais as $animal)
        <tr class="info">
        <th scope="row">{{$animal->id}}</th>
            <td>{{$animal->raca}}</td>
            <td>R$ {{number_format($animal->preco,2, ',', '.')}}</td>
            <td>{{$animal->descricao}}</td>
            <td>{{$animal->status}}</td>
            <td>
                <a href="{{route('animal-edit',$animal->id)}}" class="btn btn-info">
                  <i class="fa fa-wrench"></i>
                </a>
                <a href="{{route('animal-delete',$animal->id)}}" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Páginação -->
  {!! $animais->links() !!}
@stop