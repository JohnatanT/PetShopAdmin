
@extends('site.layout')

@section('title','Loja > Produtos')

@section('content')

        <div class="row compra">
            <h2>Compra Processada com Sucesso!</h2>
            <img src="{{url('resource/site/img/delivery-truck.png')}}" alt="Pet Shop" style="width: 400px;">
            <h4>Verifique as informações do Pedido: </h4>
            <p>Produto: {{$produto->nome}}</p>
            <p>Valor do Produto: R$ {{$produto->preco}}</p>
            <p>Valor do Frete: R$ {{$valor}}</p>
            <p>Prazo de entrega: {{$prazo}} dia(s)</p>
            <p>Descrição: {{$produto->descricao}}</p>
            <a href="{{route('loja')}}" class="btn btn-success" id="finalizar">Finalizar Compra</a>
        </div>

@include('includes')
@endsection