@extends('Layouts.app')
    
@section ('titulo', 'Inicio')

@section ('contenido')

<div class="wrapper">

    <h2><strong>Catalogo completo</strong></h2>

    {{-- <input type="search" class="search" placeholder="Busca la serie que te gustaria leer!"> --}}

    <div class="cards">

        @foreach ($catalogo as $obra)

            <figure class="card">

                <img src="{{ $obra->linkImage }}" />

                <figcaption><a href="serie/{{ $obra->id }}">{{ $obra->nombre }}</a><br>
                </figcaption>

            </figure>

        @endforeach

    </div>

</div>

@endsection

