@extends('admin.layouts.home')

@section('conteudo-principal')

<section class="section">


    <form action="{{$action}}" method="POST">


        {{-- cross-site request forgery csrf--}}
        @csrf
        @isset($cliente)
            @method('PUT')
        @endisset
        <div class="input-field">
            <input type="text" name="nome" id="nome" value="{{old('nome', $cliente->nome ??  '')}}"/>
            <label for="nome">Nome</label>
            @error('nome')
                <span class='red-text text-accent-3'><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="cpf" id="cpf" value="{{old('cpf', $cliente->cpf ??  '')}}"/>
            <label for="cpf">CPF</label>
            @error('cpf')
                <span class='red-text text-accent-3'><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="telefone" id="telefone" value="{{old('telefone', $cliente->telefone ??  '')}}"/>
            <label for="telefone">Telefone</label>
            @error('telefone')
                <span class='red-text text-accent-3'><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="email" id="email" value="{{old('email', $cliente->email ??  '')}}"/>
            <label for="email">E-mail</label>
            @error('email')
                <span class='red-text text-accent-3'><small>{{$message}}</small></span>
            @enderror
        </div>

        <div class="right-align">
            <a class="btn-flat waves-effect" href="{{route('admin.clientes.listar')}}">Cancelar</a>
            <button class="btn waves-effect waves-light" type="submit">
                Salvar
            </button>
        </div>

    </form>
</section>
@endsection
