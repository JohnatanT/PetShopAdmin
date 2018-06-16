<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Animal\Animal;
use App\Models\Admin\Servico\Servico;
use App\Models\Admin\Produto\Produto;
use App\Http\Requests\Site\CompraFormRequest;
use App\Http\Requests\Site\AgendaFormRequest;
use EscapeWork\Frete\Correios\PrecoPrazo;
use EscapeWork\Frete\Correios\Data;
use EscapeWork\Frete\FreteException;

class SiteController extends Controller
{

    private $animal;
    private $produto;
    private $servico;

    public function __construct(Servico $servico, Animal $animal, Produto $produto)
    {
        $this->servico = $servico;
        $this->animal = $animal;
        $this->produto = $produto;
    }

    public function index()
    {
        return view('welcome');
    }

    public function loja()
    {
        return view('site.loja');
    }

    public function produtos()
    {
        $produtos = $this->produto->all();
        return view('site.produtos',compact('produtos'));
    }

    public function servicos()
    {
        $servicos = $this->servico->all();
        return view('site.servicos',compact('servicos'));
    }

    public function filhotes()
    {
        $animais = $this->animal->all();
        return view('site.filhotes',compact('animais'));
    }

    public function sobre()
    {
        return view('site.sobre');
    }


    public function produto($id)
    {
        $produto = $this->produto->find($id);
        return view('site.produto',compact('produto'));
    }

    public function servico($id)
    {
        $servico = $this->servico->find($id);
        return view('site.servico',compact('servico'));
    }

    public function filhote($id)
    {
        $filhote = $this->animal->find($id);
        return view('site.filhote',compact('filhote'));
    }

    public function compra(CompraFormRequest $request)
    {
        $produto = $this->produto->find($request->idProd);
        $frete = new PrecoPrazo();
        $frete->setCodigoServico(Data::SEDEX)
              ->setCepOrigem(60337380)   # apenas numeros, sem hifen(-)
              ->setCepDestino($request->cep) # apenas numeros, sem hifen(-)
              ->setComprimento(30)              # obrigatorio
              ->setAltura(30)                   # obrigatorio
              ->setLargura(30)                  # obrigatorio
              ->setDiametro(30)                 # obrigatorio
              ->setPeso(0.5);                   # obrigatorio
        
        try {
            $result = $frete->calculate();
        
            $valor = $result['cServico']['Valor'];
            $prazo = $result['cServico']['PrazoEntrega'];
        
           
        }
        catch (FreteException $e) {
            // trate o erro adequadamente (e não escrevendo na tela)
            echo $e->getMessage();
            echo $e->getCode(); // este código é o código de erro dos correios
                                // pode ser usado pra dar mensagens como CEP inválido para o cliente
        }
        return view('site.compra',compact('valor','prazo','produto'));
    }

    public function agendar(AgendaFormRequest $request)
    {
        $dataForm = $request->all();
        $servico = $this->servico->find($request->idServico);
        //dd($dataForm);
        return view('site.agendar',compact('servico','dataForm'));
    }

}
