@extends('../Layouts.app')
    
@section ('titulo', 'Dashboard-Series')

@section ('contenido')

<div class="container">
    <div class="table-header">
        <h1>Series</h1>
        <div>
            <button><a href="#modal">Agregar</a></button>
        </div>
    </div>

    @if (\Session::has('eliminado'))

        <div class="w3-panel">
            <h1>Eiminado!</h1>
            <p>El capitulo se elimino correctamente.</p>
        </div>

    @endif

    @if (\Session::has('subido'))

        <div class="w3-panel2">
            <h1>Subido!</h1>
            <p>El capitulo se subio correctamente.</p>
        </div>

    @endif

    <table class="serie-class">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Portada</td>
                <td>Acciones</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($series as $item)

            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td><img src="{{ $item->linkImage }}" alt="" width="100px" height="120px"></td>
                <td class="acciones">
                    <a href="capitulos/{{ $item->id }}" class="see"><i class='bx bx-search-alt-2'></i></a>
                    <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
<div style="margin-top: 2rem">

    <ul class="pagination" role="menubar" aria-label="Pagination">
        <li><a href="{{$series->previousPageUrl()}}"><span><i class='bx bx-skip-previous'></i></span></a></li>
        @for($i=1;$i<=$series->lastPage();$i++)
            <li><a href="{{$series->url($i)}}">{{$i}}</a></li>
         @endfor
        <li><a href="{{$series->nextPageUrl()}}"><span><i class='bx bx-skip-next'></i></span></a></li>
    </ul>

</div>



<div id="modal" class="modal">
    <div class="modal_container">
        <form id="crear-form" class="form-style-9" action="serie/store" method="POST">
            @csrf
            <ul>
                <li>
                    <input id="nombre" type="text" name="nombre" class="field-style field-full align-none" placeholder="Nombre" />
                </li>
                <li>
                    <input id="slug" type="text" name="slug" class="field-style field-full align-none" placeholder="Slug" />
                </li>
                <li>
                <input id="imagen" type="text" name="imagen" class="field-style field-full align-none" placeholder="Imagen" />
                </li>
                <li>
                    <input id="portada" type="text" name="portada" class="field-style field-full align-none" placeholder="Portada" />
                </li>
                <li>
                <textarea id="descripcion" name="descripcion" class="field-style" placeholder="Descripcion"></textarea>
                </li>
                <li>
                <input type="submit" value="Subir serie" />
                <a href="#general">Cerrar</a>
                </li>
            </ul>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.w3-panel").remove();
            $("div.w3-panel2").remove();
        }, 5000 ); // 5 secs
    });
</script>

@endsection