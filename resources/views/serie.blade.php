@extends('Layouts.app')
    
@section ('titulo', 'Inicio')

@section ('contenido')

<section class="container">
        <div class="plx-card gold">
            <div class="pxc-bg"
                style="background-image:url('https://th.bing.com/th/id/R.c158ede7a7c84afc610759e6379bb26e?rik=y%2fmqf%2b0wVKIe4Q&pid=ImgRaw&r=0')">
            </div>
            <div class="pxc-avatar"><img src="{{ $serie->linkImage }}" />
            </div>
            <div class="pxc-stopper"> </div>
            <div class="pxc-subcard">
                <br>
                <div class="pxc-title">{{ $serie->nombre }}</div>
                <br><br>
                <div class="pxc-feats">{{ $serie->descripcion }}</div>
                <!-- <div class="pxc-tags">
                    <div>Accion</div>
                    <div>Aventura</div>
                    <div>Artes Marciales</div>
                    <div>Fantasia</div>
                    <div>Rencarnacion</div>como 
                </div> -->
            </div>
        </div>
</section>

<section class="capitulos-obra-pag-obra">
    <div class="d-flex justify-content-space-between contenedor-caps">
        <h3>Capítulos</h3>

    </div>

    <article id="first_caps" class="lista-capitulos">
        @foreach ($capitulos as $cap)
        <div class="cuadro-obra">
            <div class="capitulo-apartado">
                <p class="enlace-apartado" onclick="abrirCap('capB0')" id="capB0">Capítulo {{ $cap->numero }}</p>
                <!-- <a class="marcador-leido " id="368.00"><i class="fa fa-bookmark"></i></a> -->
                <a href="{{ route('Capitulo.show', $cap->id ) }}" class="scan-capitulo" target="_blank"><i class="fa fa-play"
                        aria-hidden="true"></i></a>
            </div>
        </div>
        @endforeach
    </article>
</section>

@endsection