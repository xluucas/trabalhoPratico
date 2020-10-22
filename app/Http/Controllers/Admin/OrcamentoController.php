<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\OrcamentoRequest;
use App\Models\Orcamento;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class OrcamentoController extends Controller
{
    public function orcamentos(){

        $subtitulo = 'Lista de orçamentos';

        $orcamentos = Orcamento::all();
        $clientes = Cliente::all();

        return view('admin.orcamentos.index', compact('subtitulo','orcamentos'));
    }

    public function formAdicionar()
    {
        $materiais = Material::all();
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $action = route('admin.orcamentos.adicionar');
        return view('admin.orcamentos.form', compact('action', 'servicos', 'clientes','materiais'));
    }

    public function adicionar(OrcamentoRequest $request)
    {


        //Criar um objeto do modelo classe servico

        DB::beginTransaction();
        $orcamento = Orcamento::create($request->all());
        //$orcamento->servico()->create($request->all());

        //if($request->has('materiais')){
           // $orcamento->materiais()->sync($request->materiais);
        //}
        //$orcamento->cliente()->create($request->all());
        DB::Commit();

        $request->session()->flash('sucesso',"Orcamento incluído com sucesso");
        return redirect()->route('admin.orcamentos.listar');

    }

    public function deletar($id, Request $request)
    {
        Orcamento::destroy($id);
        $request->session()->flash('sucesso',"Orcamento excluído com sucesso");
        return redirect()->route('admin.orcamentos.listar');
    }

    public function formEditar($id)
    {
        $orcamento = Orcamento:: find($id);
        $action = route ('admin.orcamentos.editar', $orcamento->id);
        return view('admin.orcamentos.form', compact('orcamento', 'action'));

    }

    public function editar(OrcamentoRequest $request, $id)
    {
        $orcamento = Orcamento::find($id);
        $orcamento -> total = $request->total;
        $orcamento -> save();
        $request->session()->flash('sucesso',"Orcamento alterado com sucesso");
        return redirect()->route('admin.orcamentos.listar');

    }


}
