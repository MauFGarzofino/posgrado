<!DOCTYPE html>
<html>
<head>
    <title>Laravel DataTable - Universidades</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>

<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Universidades</h3>

        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('universidades.create') }}" class="btn btn-success">Añadir</a>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Nombre Abreviado</th>
                    <th>Inicial</th>
                    <th>Estado</th>
                    <th width="150px">Acciones</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('universidades.index') }}",
            columns: [
                {data: 'id_universidad', name: 'id_universidad'},
                {data: 'nombre', name: 'nombre'},
                {data: 'nombre_abreviado', name: 'nombre_abreviado'},
                {data: 'inicial', name: 'inicial'},
                {data: 'estado', name: 'estado'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
</html>
