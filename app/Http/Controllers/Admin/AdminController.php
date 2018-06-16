<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Animal\Animal;
use App\Models\Admin\Servico\Servico;
use App\Models\Admin\Produto\Produto;

class AdminController extends Controller
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
        $animais = $this->animal->count();
        $produtos = $this->produto->count();
        $servicos = $this->servico->count();

        return view('home',compact('animais','produtos','servicos'));
    }

}
