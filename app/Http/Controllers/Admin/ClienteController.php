<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;


class ClienteController extends Controller
{
    public function clientes(){

        $subtitulo = 'Lista de orçamentos';

        $clientes = Cliente::all();

        return view('admin.clientes.index', compact('subtitulo','clientes'));
    }

    public function formAdicionar()
    {

        $action = route('admin.clientes.adicionar');
        return view('admin.clientes.form', compact('action'));
    }

    public function adicionar(ClienteRequest $request)
    {
        //Validar dados
        //$request->validate([
        //'nome' => 'bail|required|min:3|max:100|unique:clientes'
        //]);

        //Criar um objeto do modelo classe servico

        Cliente::create($request->all());
        $request->session()->flash('sucesso',"Cliente $request->nome incluído com sucesso");


        return redirect()->route('admin.clientes.listar');

    }

    public function deletar($id, Request $request)
    {
        Cliente::destroy($id);
        $request->session()->flash('sucesso',"Orcamento excluído com sucesso");
        return redirect()->route('admin.clientes.listar');
    }

    public function formEditar($id)
    {
        $cliente = Cliente:: find($id);
        $action = route ('admin.clientes.editar', $cliente->id);
        return view('admin.clientes.form', compact('cliente', 'action'));

    }

    public function editar(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        $cliente -> nome = $request->nome;
        $cliente -> cpf = $request->cpf;
        $cliente -> telefone = $request->telefone;
        $cliente -> email = $request->email;
        $cliente -> save();
        $request->session()->flash('sucesso',"Cliente $request->nome alterado com sucesso");
        return redirect()->route('admin.clientes.listar');

    }
}
