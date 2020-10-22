@extends('admin.layouts.home')

@section('conteudo-materiais')
    <section class="section">
        <table class="highlight">
            <thead>
                <tr>
                    <th>Material</th>
                    <th class="right-align">Opçoes</th>
                </tr>
            </thead>

        <tbody>
            @forelse ($materiais as $materiais)
            <tr>
                <td>{{$materiais->nome}}</td>
                <td class="right-align">
                    <a href="{{route('admin.materiais.formEditar',$materiais->id)}}">
                    <span>
                        <i class="material-icons blue-text text-accent-2">edit</i>
                    </span>
                </a>
                    <form action="{{route('admin.materiais.deletar',$materiais->id)}}" method="POST" style="display: inline;">
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
                <td colspan="4">Não existe material cadastrados.</td>
            </tr>
        @endforelse
        </tbody>
            </table>
                    <div class="fixed-action-btn">
                        <a class="" href="{{route('admin.materiais.form')}}">
                            <i class="large material-icons">add</i>
                    </div>
            </section>
            @endsection
