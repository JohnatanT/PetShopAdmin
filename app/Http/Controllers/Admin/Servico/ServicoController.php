<?php

namespace App\Http\Controllers\Admin\Servico;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Servico\Servico;
use App\Http\Requests\Admin\Servico\ServicoFormRequest;

class ServicoController extends Controller
{

    private $servico;

    public function __construct(Servico $servico)
    {
        $this->servico = $servico;
    }

    public function create()
    {
        return view('admin.servico.create');
    }

    public function index()
    {
        $servicos = $this->servico->paginate(10);
        return view('admin.servico.index',compact('servicos'));
    }

     //Cadastra de Serviço
     public function store(ServicoFormRequest $request)
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
 
             $uplod = $request->image->storeAs('servicos',$nameFile);
             if(!$uplod)
                 return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
         }
 
         //Servico ao ser cadastrado recebe o status 1
         $dataForm['status'] = 1;
 
         //Inserindo dados
         $insert = $this->servico->create($dataForm);
 
         //Verificando o retorno da inserção
         if($insert)
             return redirect()->back()->with('success','Serviço Cadastrado com Sucesso!');
         else 
             return redirect()->back()->with('erro','Falha ao Cadastrar Serviço!');
     }

     public function edit($id)
    {
        //Recupera o produto pelo ID
        $servico = $this->servico->find($id);

        return view('admin.servico.create',compact('servico'));
    }

    public function update(ServicoFormRequest $request, $id){
        $dataForm = $request->all();
        $servico = $this->servico->find($id);

        //Pegando Imagem e Validando
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //Criando um nome pra imagem
            $name = rand().kebab_case($dataForm['nome']);

            //Pegando sua extensão
            $extenstion = $request->image->getClientOriginalExtension();

            $nameFile = "{$name}.{$extenstion}";
            //Fazendo Upload da imagem no Storage

            $dataForm['image'] = $nameFile;

            $uplod = $request->servico->storeAs('servicos',$nameFile);
            if(!$uplod)
                return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
        }

        $update = $servico->update($dataForm);

        if($update)
            return redirect()->back()->with('success','Serviço Editado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha no Update do Serviço!');
    }
 
    public function delete($id)
    {
        $servico = $this->servico->find($id);
        $delete = $servico->delete();

        if($delete)
            return redirect()->back()->with('success','Serviço Deletado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha na Exclusão do Serviço!');

    }

}
