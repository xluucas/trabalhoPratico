@extends('admin.layouts.home')

@section('conteudo-principal')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Clientes cadastrados</th>
                    <th class="right-align">Opçoes</th>
                </tr>
            </thead>
        <tbody>
            @forelse ($clientes as $clientes)
                <tr>
                    <td>{{$clientes->nome}}</td>
                    <td class="right-align">
                        <a href="{{route('admin.clientes.formEditar',$clientes->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                    </a>
                        <form action="{{route('admin.clientes.deletar',$clientes->id)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button style="border:0;background:transparent;" type="submit">

                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-accent-4">delete_forever</i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Não existe clientes cadastrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
        <div class="fixed-action-btn">
            <a class="" href="{{route('admin.clientes.form')}}">
                <i class="large material-icons">add</i>
        </div>


    </section>
@endsection

