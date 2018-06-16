@extends('site.layout')

@section('title','Loja > Filhotes')

@section('content')

@include('includes')
<div class="row produto">
    <div class="col-md-12">
        <img src="{{url("storage/animais")."/".$filhote->image}}" alt="{{$filhote->raca}}" style="max-width: 400px;">
    </div>
    <div class="col-md-12">
        <h3>{{$filhote->raca}}</h3>
        <p>{{$filhote->descricao}}.</p>
        <p>VALOR: R$ {{number_format($filhote->preco,2, ',', '.')}}</p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Contato</button>
    </div>
</div>

@endsection