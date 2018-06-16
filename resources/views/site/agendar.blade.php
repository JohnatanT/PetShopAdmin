
@extends('site.layout')

@section('title','Loja > Agendar')

@section('content')

        <div class="row compra">
            <h2>Agendamento Processado com Sucesso!</h2>
            <img src="{{url('resource/site/img/delivery-truck.png')}}" alt="Pet Shop" style="width: 400px;">
            <h4>Verifique as informações do Serviço: </h4>
            <table class="table">
                <thead>
                  <tr class="success">
                    <th scope="col">Cliente</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="info">
                        
                        <td>{{$dataForm['nome']}}</td>
                        <td>{{$dataForm['email']}}</td>
                        <td>{{$dataForm['cpf']}}</td>
                        <td>{{$dataForm['raca']}}</td>
                        <td>{{$dataForm['animal']}}</td>
                        <td>{{$servico->nome}}</td>
                        <td>R$ {{number_format($servico->preco,2, ',', '.')}}</td>
                        <td>{{ date( 'd/m/Y' , strtotime($dataForm['data']))}}</td>
                    </tr>
                </tbody>
              </table>
            <a href="{{route('loja')}}" class="btn btn-success" id="finalizar">Finalizar</a>
        </div>

@include('includes')
@endsection