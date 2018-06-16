@extends('site.layout')

@section('title','Loja > Filhotes')

@section('content')
<div class="row" style="margin-top: 50px;">
        @foreach($animais as $animal)
        <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="{{url("storage/animais")."/".$animal->image}}" alt="{{$animal->raca}}">
                    <div class="caption">
                        <h3>{{$animal->raca}}</h3>
                        <h4>R$ {{number_format($animal->preco,2, ',', '.')}}</h4>
                        <p>{{$animal->descricao}}</p>
                        <p><a href="{{route('loja-filhote',['id' => $animal->id ])}}" class="btn btn-primary" role="button">Comprar</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection