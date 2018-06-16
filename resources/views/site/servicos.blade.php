@extends('site.layout')

@section('title','Loja > Serviços')

@section('content')
<div class="row" style="margin-top: 50px;">
        @foreach($servicos as $servico)
        <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{url("storage/servicos")."/".$servico->image}}" alt="{{$servico->nome}}">
                    <div class="caption">
                        <h3>{{$servico->nome}}</h3>
                        <h4>R$ {{number_format($servico->preco,2, ',', '.')}}</h4>
                        <p>{{$servico->descricao}}</p>
                        <p><a href="{{route('loja-servico',['id' => $servico->id ])}}" class="btn btn-primary" role="button">Comprar</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection