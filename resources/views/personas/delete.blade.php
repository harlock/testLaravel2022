<!-- Modal -->
@php
    $delete_persona=session("delete_persona");
@endphp
<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{route('personas.destroy',$delete_persona->id_persona)}}" method="post">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas eliminar el registro de nombre {{$delete_persona->nombre}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-danger btn btn-sm " type="submit">
                        <i class="material-icons">
                            <a class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@section("scripts")
    <script type="text/javascript">
        new bootstrap.Modal(document.getElementById('modal-delete')).show();
    </script>
@endsection