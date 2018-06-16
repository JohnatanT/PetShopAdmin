@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Gestão de Produtos</h1>
    @include('includes')
@stop

@section('content')

@if(isset($produto))
    <form action="{{ route('produto-update',$produto->id) }}" method="post" class="form" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
@else
    <form action="{{ route('produto-store') }}" method="post" class="form" enctype="multipart/form-data">
@endif
    {!! csrf_field() !!}
        <label for="nome">Nome do Produto</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome or old('nome') }}" required>
        <label for=descricao"">Descrição do Produto</label>
        <textarea name="descricao" id="descricao" required cols="30" rows="10" class="form-control">{{$produto->descricao or old('descricao') }}</textarea>
        <label for="preco">Preço do Poduto</label>
        <input type="number" name="preco" id="preco" value="{{$produto->preco or old('preco') }}" required class="form-control">
        <label for="image">Foto do Produto</label>
        @if(isset($produto))
            <img src="{{url("storage/produtos")."/".$produto->image}}" alt="{{$produto->nome}}" style="width: 100px;">
        @endif
        <input type="file" name="image" id="image" class="form-control">
        <button type="submit" class="btn btn-danger">Cadastrar</button>
    </form>
@stop