<x-layout title="Editar Série {{$serie->nome}}">
    <x-series.form action="{{ route('series.edit') }}" :nome="$serie->nome" />
</x-layout>
