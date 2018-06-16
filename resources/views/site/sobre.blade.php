@extends('site.layout')

@section('title','Loja > S0bre')

@section('content')

<div class="row sobre">
        <h2>Por Que somos diferenciados?</h2>
        <div class="bloco">
            <div class="com-md-12">
                 <img src="{{url('resource/site/img/customer-service-man.png')}}" alt="Pet Shop">
            </div>
            <div class="col-md-12">
                <h3>Serviço Customizado</h3>
                <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            </div>
        </div>
        <div class="bloco">
            <div class="com-md-12">
                 <img src="{{url('resource/site/img/graduate-female.png')}}" alt="Pet Shop">
            </div>
            <div class="col-md-12">
                <h3>Profissionais Qualificados</h3>
                <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            </div>
        </div>
        <div class="bloco">
            <div class="com-md-12">
                <img src="{{url('resource/site/img/stamp-document.png')}}" alt="Pet Shop">
            </div>
            <div class="col-md-12">
                 <h3>Certicações de Qualidade</h3>
                 <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
            </div>
        </div>
    </div>
    
@endsection