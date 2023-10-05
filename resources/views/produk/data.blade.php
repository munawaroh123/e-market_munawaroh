@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-produk" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama produk</td>
            <td>Aksi</td>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_produk}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formProdukModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-nama_produk="{{ $p->nama_produk}}">Ubah
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data"
                            data-nama_produk="{{ $p->nama_produk }}">Hapus
                            <i class='fas fa-trash'></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('script')
@endpush
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#data-produk").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-produk .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush