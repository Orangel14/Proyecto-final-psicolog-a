@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
    <h1>Todos Posts</h1> 
    <div class=" mb-2">
      <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Crear Posts</a>
    </div>
    @if ($posts->count())    
        <table class="table" id="table_publicaciones">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Comentarios</th>
                    <th>Acciones</th>                   
                
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->full_name }}</td>
                        <td>{{ $post->comments->count() }}</td>
                            <td>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @else
        <center>
            <p>No hay publicaciones disponibles.</p>
        </center>
    @endif
    </div>
</div>
@endsection

@push('scripts')
    
<script type="module">
    let table = new DataTable('#table_publicaciones', {
        searchable: true,
        fixedHeight: true,
        language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Último"
            },
            aria: {
                sortAscending: ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
            },
            
        }
    });
</script>

    
@endpush