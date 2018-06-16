@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Serviços</h1>
    <a href=" {{ route('servico-cad') }} " class="btn btn-primary"><i class=" fa fa-plus-circle"></i> Cadastrar</a>
@stop

@section('content')
@include('includes')
<table class="table">
    <thead>
      <tr class="success">
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Preço</th>
        <th scope="col">Descrição</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach($servicos as $servico)
        <tr class="info">
        <th scope="row">{{$servico->id}}</th>
            <td>{{$servico->nome}}</td>
            <td>R$ {{number_format($servico->preco,2, ',', '.')}}</td>
            <td>{{$servico->descricao}}</td>
            <td>{{$servico->status}}</td>
            <td>
                <a href="{{route('servico-edit',$servico->id)}}" class="btn btn-info">
                  <i class="fa fa-wrench"></i>
                </a>
                <a href="{{route('servico-delete',$servico->id)}}" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Páginação -->
  {!! $servicos->links() !!}
@stop