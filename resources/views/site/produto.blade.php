@extends('site.layout')

@section('title','Loja > Produtos')

@section('content')

<div class="row produto">
    <div class="col-md-12">
        <img src="{{url("storage/produtos")."/".$produto->image}}" alt="{{$produto->nome}}" style="max-width: 400px;">
    </div>
    <div class="col-md-12">
        <h3>{{$produto->nome}}</h3>
        <p>{{$produto->descricao}}.</p>
        <p>VALOR: R$ {{number_format($produto->preco,2, ',', '.')}}</p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#compra">Comprar</button>
    </div>
</div>

 <!-- Modal -->
 <div id="compra" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dados da Compra</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produto-compra') }}" method="post" class="form">
                        {!! csrf_field() !!}
                        <label for="nome">Nome</label>
                        <input required placeholder="Digite o seu nome" type="text" name="nome" id="nome" class="form-control">
                        <label for="email">E-mail</label>
                        <input required placeholder="Digite o seu E-mail" type="email" name="email" id="email" class="form-control">
                        <label for="cpf">CPF</label>
                        <input required placeholder="Digite o seu CPF" type="text" name="cpf" id="cpf" class="cpf form-control">
                        <label for="cep">CEP</label>
                        <input required placeholder="Digite o seu CEP" type="text" name="cep" id="cep" class="cep form-control">
                        <button type="submit" class="btn btn-danger">Comprar</button>
                    <input type="hidden" name="idProd" value="{{$produto->id}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@include('includes')
@endsection