<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Oficina - Funilaria e Pintura</title>
</head>
<body>
    {{-- Menu topo --}}
    <nav class="indigo darken-4">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo left">Oficina Funilaria e Pintura</a>
                <ul class="right">
                    <li>
                        <a href="{{route('admin.servicos.listar')}}">Serviços</a>
                    </li>
                    <li>
                        <a href="{{route('admin.materiais.listar')}}">Materiais</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orcamentos.listar')}}">Orçamentos</a>
                    </li>
                    <li>
                        <a href="{{route('admin.clientes.listar')}}">Clientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Home --}}
    <div class="container">
        @yield('home')
    </div>
    {{-- Home --}}
    <div class="container">
        @yield('conteudo-index')
    </div>
    {{-- Conteudo principal --}}
    <div class="container">
        @yield('conteudo-principal')
    </div>
    {{-- Materiais --}}
    <div class="container">
        @yield('conteudo-materiais')
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
    @if (session('sucesso'))
        M.toast({html: "{{session('sucesso')}}"});
    @endif

    document.addEventListener('DOMContentLoaded', function(){
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    </script>
</body>
</html>
