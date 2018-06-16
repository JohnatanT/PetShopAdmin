@extends('adminlte::page')

@section('title', 'PetShop')

@section('content_header')
    <h1>Gestão de Serviço</h1>
    @include('includes')
@stop

@section('content')

@if(isset($servico))
    <form action="{{ route('servico-update',$servico->id) }}" method="post" class="form" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
@else
    <form action="{{ route('servico-store') }}" method="post" class="form" enctype="multipart/form-data">
@endif

    {!! csrf_field() !!}
    <label for="nome">Nome do Serviço</label>
    <input type="text" class="form-control" id="nome" name="nome" value="{{$servico->nome or old('nome') }}" required>
    <label for=descricao"">Descrição do Serviço</label>
    <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" required>{{$servico->descricao or old('descricao') }}</textarea>
    <label for="preco">Preço do Serviço</label>
    <input type="number" name="preco" id="preco" value="{{$servico->preco or old('preco') }}" required class="form-control">
    <label for="image">Foto do Serviço</label>
    @if(isset($servico))
            <img src="{{url("storage/servicos")."/".$servico->image}}" alt="{{$servico->nome}}" style="width: 100px;">
        @endif
    <input type="file" name="image" id="image" class="form-control">
    <button type="submit" class="btn btn-danger">Cadastrar</button>
</form>
@stop