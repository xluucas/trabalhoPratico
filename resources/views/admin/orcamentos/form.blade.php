@extends('admin.layouts.home')

@section('conteudo-principal')

<section class="section">


    <form action="{{$action}}" method="POST">


        {{-- cross-site request forgery csrf--}}
        @csrf
        @isset($orcamento)
            @method('PUT')
        @endisset

        {{--Titulp--}}
        <div class="row">
            <div class="input-field col s12">
                <label for="titulo">Cadastro de Orcamento</label>
            </div>
        </div>
        {{--Cliente--}}
        <div class="row">
            <div class="input-field col s12">
                <select name="cliente_id" id="cliente_id"/>
                    <option value="" disabled selected>Selecione o cliente</option>

                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                    @endforeach
                </select>
                <label for="cliente_id">Nome cliente</label>
            </div>
        </div>
        {{--Servico--}}
        <div class="row">
            <div class="input-field col s12">
                <select name="servico_id" id="servico_id"/>
                    <option value="" disabled selected>Selecione o servico</option>
                    @foreach ($servicos as $servico)
                    <option value="{{$servico->id}}">{{$servico->nome}}</option>
                    @endforeach
                </select>
                <label for="servico_id">Servico</label>
            </div>
        </div>
        {{--Materiais--}}
        <div class="row">
            <div class="input-field col s12">
                @foreach ($materiais as $material)
                <p>
                        <label style="margin-right: 30px">
                            <input type="checkbox" class="filled-in" name="materiais_id" id="materiais_id" value="{{$material->id}}"/>

                        <span>
                            {{$material->nome}}
                        </span>
                     </label>
                </p>
                @endforeach
            </div>
        </div>
        {{--Valor total--}}

        <div class="row">
            <div class="input-field col s12">
                <input type="number" name="total" id="total">
                <label for="total">Total</label>
            </div>
        </div>

        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.orcamentos.listar')}}">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">
                Salvar
            </button>
        </div>

    </form>
</section>
@endsection
