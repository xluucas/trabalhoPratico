<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;

class MateriaisController extends Controller
{

    public function materiais(){

        $tituloMateriais = 'Lista de materiais';


        $materiais = Material::all();

        return view('admin.materiais.index', compact('tituloMateriais','materiais'));
    }

    public function formAdicionar()
    {
        $action = route('admin.materiais.adicionar');
        return view('admin.materiais.form', compact('action'));
    }

    public function adicionar(Request $request)
    {
        //Validar dados
        //$request->validate([
        //'nome' => 'bail|required|min:3|max:100|unique:servicos'
        //]);

        //Criando projeto de forma tradicional

        //$material = new Material();
        //$material->nome = $request->nome;
        //$material->quantidade = $request->quantidade;
        //$material->valor = $request->valor;

        //$material->save(); //salvar no bd
        //Criar um objeto do modelo classe servico


        Material::create($request->all());
        $request->session()->flash('sucesso',"Material $request->nome incluído com sucesso");


        return redirect()->route('admin.materiais.listar');

    }
    public function deletar($id, Request $request)
    {
        Material::destroy($id);
        $request->session()->flash('sucesso',"Material excluído com sucesso");
        return redirect()->route('admin.materiais.listar');
    }

    public function formEditar($id)
    {
        $material = Material:: find($id);
        $action = route ('admin.materiais.editar', $material->id);
        return view('admin.materiais.form', compact('material', 'action'));

    }

    public function editar(MaterialRequest $request, $id)
    {
        $material = Material::find($id);
        $material -> nome = $request->nome;
        $material -> save();
        $request->session()->flash('sucesso',"Material $request->nome alterado com sucesso");
        return redirect()->route('admin.materiais.listar');

    }


}
