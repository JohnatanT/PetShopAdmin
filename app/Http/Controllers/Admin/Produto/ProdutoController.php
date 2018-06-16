<?php

namespace App\Http\Controllers\Admin\Produto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Produto\Produto;
use App\Http\Requests\Admin\Produto\ProdutoFormRequest;

class ProdutoController extends Controller
{

    private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function create()
    {
        return view('admin.produto.create');
    }

    public function index()
    {
        $produtos = $this->produto->paginate(10);
        return view('admin.produto.index',compact('produtos'));
    }

    //Cadastra o Produto
    public function store(ProdutoFormRequest $request)
    {
        $dataForm = $request->all(); //Pegando dados do Formulario
        //$dd($request->all());
        $dataForm['nome'] = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $dataForm['nome'] ) );

        //Pegando Imagem e Validando
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //Criando um nome pra imagem
            $name = rand().kebab_case($dataForm['nome']);

            //Pegando sua extensão
            $extenstion = $request->image->getClientOriginalExtension();

            $nameFile = "{$name}.{$extenstion}";
            //Fazendo Upload da imagem no Storage

            $dataForm['image'] = $nameFile;

            $uplod = $request->image->storeAs('produtos',$nameFile);
            if(!$uplod)
                return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
        }

        //Produto aom ser cadastrado recebe o status 1
        $dataForm['status'] = 1;

        //Inserindo dados
        $insert = $this->produto->create($dataForm);

        //Verificando o retorno da inserção
        if($insert)
            return redirect()->back()->with('success','Produto Cadastrado com Sucesso!');
        else 
            return redirect()->back()->with('erro','Falha ao Cadastrar Produto!');
    }

    public function edit($id)
    {
        //Recupera o produto pelo ID
        $produto = $this->produto->find($id);

        return view('admin.produto.create',compact('produto'));
    }

    public function update(ProdutoFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $produto = $this->produto->find($id);

        //Pegando Imagem e Validando
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //Criando um nome pra imagem
            $name = rand().kebab_case($dataForm['nome']);

            //Pegando sua extensão
            $extenstion = $request->image->getClientOriginalExtension();

            $nameFile = "{$name}.{$extenstion}";
            //Fazendo Upload da imagem no Storage

            $dataForm['image'] = $nameFile;

            $uplod = $request->image->storeAs('produtos',$nameFile);
            if(!$uplod)
                return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
        }

        $update = $produto->update($dataForm);

        if($update)
            return redirect()->back()->with('success','Produto Editado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha no Update Produto!');

    }

    public function delete($id)
    {
        $produto = $this->produto->find($id);
        $delete = $produto->delete();

        if($delete)
            return redirect()->back()->with('success','Produto Deletado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha na Exclusão do Produto!');

    }

}
