@extends('admin.layouts.home')

@section('conteudo-principal')

<section class="section">


    <form action="{{$action}}" method="POST">


        {{-- cross-site request forgery csrf--}}
        @csrf
        @isset($servico)
            @method('PUT')
        @endisset
        <div class="input-field">
            <input type="text" name="nome" id="nome" value="{{old('nome', $servico->nome ??  '')}}"/>
            <label for="nome">Nome</label>
            @error('nome')
                <span class='red-text text-accent-3'><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.servicos.listar')}}">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">
                Salvar
            </button>
        </div>

    </form>
</section>
@endsection
