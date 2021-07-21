@extends('layout')

@section('cabecalho')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')

    <ul class="list-group">

        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center> Temporada {{ $temporada->numero }}" </li>
            <a href= "temporadas/{{ $temporada->id }}/episodios">
                Temporada {{ $temporada->numero }}
            </a>
            <span class="badge badge-dark">
                0 / {{ $temporada->episodios->count() }}
            </span>
        @endforeach
    </ul>
@endsection
