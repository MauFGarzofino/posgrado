<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">{{ $title }}</h3>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ $createRoute }}" class="btn btn-success">Añadir</a>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    @foreach($columns as $column)
                        <th>{{ $column['label'] }}</th>
                    @endforeach
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ $ajaxRoute }}",
            columns: [
                    @foreach($columns as $column)
                {data: '{{ $column['data'] }}', name: '{{ $column['name'] }}'},
                    @endforeach
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
