<?php

namespace App\Http\Controllers\Admin\Animal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Animal\Animal;
use App\Http\Requests\Admin\Animal\AnimalFormRequest;

class AnimalController extends Controller
{

    private $animal;

    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    public function create()
    {
        return view('admin.animal.create');
    }

    public function index()
    {
       $animais = $this->animal->paginate(10);
        return view('admin.animal.index',compact('animais'));
    }

    //Cadastra de Animal
    public function store(AnimalFormRequest $request)
    {
        $dataForm = $request->all(); //Pegando dados do Formulario
        //$dd($request->all());
        $dataForm['raca'] = preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $dataForm['raca'] ) );

        //Pegando Imagem e Validando
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //Criando um nome pra imagem
            $name = rand().kebab_case($dataForm['raca']);

            //Pegando sua extensão
            $extenstion = $request->image->getClientOriginalExtension();

            $nameFile = "{$name}.{$extenstion}";
            //Fazendo Upload da imagem no Storage

            $dataForm['image'] = $nameFile;

            $uplod = $request->image->storeAs('animais',$nameFile);
            if(!$uplod)
                return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
        }

        //Animal ao ser cadastrado recebe o status 1
        $dataForm['status'] = 1;

        //Inserindo dados
        $insert = $this->animal->create($dataForm);

        //Verificando o retorno da inserção
        if($insert)
            return redirect()->back()->with('success','Animal Cadastrado com Sucesso!');
        else 
            return redirect()->back()->with('erro','Falha ao Cadastrar Animal!');
    }

    public function edit($id)
    {
        //Recupera o produto pelo ID
        $animal = $this->animal->find($id);

        return view('admin.animal.create',compact('animal'));
    }

    public function update(AnimalFormRequest $request, $id){
        $dataForm = $request->all();
        $animal = $this->animal->find($id);

        //Pegando Imagem e Validando
        if($request->hasFile('image') && $request->file('image')->isValid()){
            //Criando um nome pra imagem
            $name = rand().kebab_case($dataForm['nome']);

            //Pegando sua extensão
            $extenstion = $request->image->getClientOriginalExtension();

            $nameFile = "{$name}.{$extenstion}";
            //Fazendo Upload da imagem no Storage

            $dataForm['image'] = $nameFile;

            $uplod = $request->image->storeAs('animais',$nameFile);
            if(!$uplod)
                return redirect()->back()->with('erro','Falha ao fazer Upload da Imagem!');
        }

        $update = $animal->update($dataForm);

        if($update)
            return redirect()->back()->with('success','Animal Editado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha no Update do Animal!');

    
    }


    public function delete($id)
    {
        $animal = $this->animal->find($id);
        $delete = $animal->delete();

        if($delete)
            return redirect()->back()->with('success','Animal Deletado com Sucesso!');
        else
            return redirect()->back()->with('erro','Falha na Exclusão do Animal!');

    }

}
