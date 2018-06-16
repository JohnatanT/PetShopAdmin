@extends('site.layout')

@section('title','Loja > Produtos')

@section('content')
<div class="row" style="margin-top: 50px;">
    @foreach($produtos as $produto)
    <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{url("storage/produtos")."/".$produto->image}}" alt="{{$produto->nome}}">
                <div class="caption">
                    <h3>{{$produto->nome}}</h3>
                    <h4>R$ {{number_format($produto->preco,2, ',', '.')}}</h4>
                    <p>{{$produto->descricao}}</p>
                <p><a href="{{route('loja-produto',['id' => $produto->id ])}}" class="btn btn-primary" role="button">Comprar</a></p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection