<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

use Symfony\Contracts\Service\Attribute\Required;

class ServicoController extends Controller
{
    public function servicos(){

        $subtitulo = 'Lista de serviços';
        //$servicos =['Funilaria', 'Pintura'];

        $servicos = Servico::all();

        //dd($servicos); Para informar se tem dados

        //foreach($servicos as $servicos){
            //echo $servicos->nome;

        //}

        return view('admin.servicos.index', compact('subtitulo','servicos'));
    }

    public function formAdicionar()
    {
        $action = route('admin.servicos.adicionar');
        return view('admin.servicos.form', compact('action'));
    }

    public function adicionar(ServicoRequest $request)
    {
        //Validar dados
        //$request->validate([
        //'nome' => 'bail|required|min:3|max:100|unique:servicos'
        //]);

        //Criar um objeto do modelo classe servico

        Servico::create($request->all());
        $request->session()->flash('sucesso',"Servico $request->nome incluído com sucesso");


        return redirect()->route('admin.servicos.listar');

    }

    public function deletar($id, Request $request)
    {
        Servico::destroy($id);
        $request->session()->flash('sucesso',"Servico excluído com sucesso");
        return redirect()->route('admin.servicos.listar');
    }

    public function formEditar($id)
    {
        $servico = Servico:: find($id);
        $action = route ('admin.servicos.editar', $servico->id);
        return view('admin.servicos.form', compact('servico', 'action'));

    }

    public function editar(ServicoRequest $request, $id)
    {
        $servico = Servico::find($id);
        $servico -> nome = $request->nome;
        $servico -> save();
        $request->session()->flash('sucesso',"Servico $request->nome alterado com sucesso");
        return redirect()->route('admin.servicos.listar');

    }
}


