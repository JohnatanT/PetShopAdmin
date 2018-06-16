<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pet Shop - @yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap -->
  <link href="{{url('resource/site/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('resource/site/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        <header>
                <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="{{route('loja')}}">LOGO</a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                      <li><a href="{{route('loja')}}">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="{{route('loja-sobre')}}">Sobre</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comprar <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                          <li><a href="{{route('loja-produtos')}}">Produtos</a></li>
                            <li><a href="{{route('loja-servicos')}}">Serviços</a></li>
                            <li><a href="{{route('loja-filhotes')}}">Filhotes</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
               </header>
               <div id="myCarousel" class="carousel slide" data-ride="carousel">  
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                      <img src="{{url('resource/site/img/slide-petshop.jpg')}}" alt="Pet Shop">
                      </div>
                    </div>
                </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="row footer">
            <footer>
                <p>Todos os direitos reservados</p>
            </footer>
        </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('resource/site/js/bootstrap.min.js')}}"></script>
    <script src="{{url('resource/site/js/script.js')}}"></script>
    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
  </body>
</html>