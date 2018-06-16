@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Produtos</h1>   
    <a href=" {{ route('produto-cad') }} " class="btn btn-primary"><i class=" fa fa-plus-circle"></i> Cadastrar</a>
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
      
      @foreach($produtos as $produto)
        <tr class="info">
        <th scope="row">{{$produto->id}}</th>
            <td>{{$produto->nome}}</td>
            <td>R$ {{number_format($produto->preco,2, ',', '.')}}</td>
            <td>{{$produto->descricao}}</td>
            <td>{{$produto->status}}</td>
            <td>
              <a href="{{route('produto-edit',$produto->id)}}" class="btn btn-info">
                <i class="fa fa-wrench"></i>
              </a>
              <a href="{{route('produto-delete',$produto->id)}}" class="btn btn-danger">
                <i class="fa fa-trash"></i>
              </a>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Páginação -->
  {!! $produtos->links() !!}
@stop