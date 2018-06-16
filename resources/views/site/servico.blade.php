@extends('site.layout')

@section('title','Loja > Produtos')

@section('content')

@include('includes')
<div class="row produto">
    <div class="col-md-12">
        <img src="{{url("storage/servicos")."/".$servico->image}}" alt="{{$servico->nome}}" style="max-width: 400px;">
    </div>
    <div class="col-md-12">
        <h3>{{$servico->nome}}</h3>
        <p>{{$servico->descricao}}.</p>
        <p>VALOR: R$ {{number_format($servico->preco,2, ',', '.')}}</p>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agendar">Contato</button>
    </div>
</div>

<!-- Modal -->
<div id="agendar" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agende o Serviço</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('agendar') }}" method="post" class="form">
                    {!! csrf_field() !!}
                    <div class="col-md-12">
                        <label for="nome">Nome</label>
                        <input required placeholder="Digite o seu nome" type="text" name="nome" id="nome" class="form-control">    
                    </div>
                    <div class="col-md-12">
                        <label for="email">E-mail</label>
                        <input required placeholder="Digite o seu E-mail" type="email" name="email" id="email" class="form-control">    
                    </div>
                    <div class="col-md-12">
                        <label for="cpf">CPF</label>
                        <input required placeholder="Digite o seu CPF" type="text" name="cpf" id="cpf" class="cpf form-control">    
                    </div>
                    <div class="col-md-12">
                        <label for="animal">Nome do Animal</label>
                        <input required placeholder="Digite o nome do seu animal" type="text" name="animal" id="animal" class="form-control">    
                    </div>
                    <div class="col-md-12">
                        <label for="raca">Raça do seu Animal</label>
                        <input type="text" name="raca" id="raca" class="form-control" required placeholder="Digite a raça do seu animal">    
                    </div>
                    <div class="col-md-12">
                        <label for="pelo">Qual a cor do pelo do seu Pet?</label>
                        <input type="text" name="pelo" id="pelo" class="form-control" required placeholder="Qual a cor do pelo do seu animal?">    
                    </div>
                    <div class="col-md-12">
                        <label for="peso">Peso do seu animal (kg)</label>
                        <input type="number" name="peso" id="peso" required class="formc-control" placeholder="Peso do seu animal (Kg)">    
                    </div>
                    <div class="col-md-12">
                        <label for="data">Escolha uma data</label>
                        <input type="date" name="data" id="data" class="form-control" required>                   
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-danger">Agendar</button>
                    </div>      
                    <input type="hidden" name="idServico" value="{{$servico->id}}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

@endsection