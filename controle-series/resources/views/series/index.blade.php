<x-layout title="Séries">
    <a class="btn btn-dark mb-2" href="{{ route('series.create') }}">Adicionar</a>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}
            <span class="d-flex">
                <a href="{{route('series.edit', $serie->id)}}" class="btn btn-info mx-2">E</a>
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    {{-- na linha abaixo, basicamente o laravel manda por baixo dos panos para a rota identificar como metodo de delete, pq o html só identifica POST e GET --}}
                    @method('DELETE')
                    <button class="btn btn-danger btn-small">X</button>
                </form>
            </span>
            </li>
        @endforeach
    </ul>
</x-layout>
