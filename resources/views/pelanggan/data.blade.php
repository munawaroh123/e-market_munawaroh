@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-pelanggan" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama Pelanggan</td>
            <td>Alamat</td>
            <td>No_telp</td>
            <td>Email</td>
            <td>Aksi</td>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->kode }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formpelangganModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-kode="{{ $p->kode }}"
                        data-nama_pelanggan="{{ $p->nama_pelanggan }}"
                        data-no_telp="{{ $p->no_telp }}"
                        data-alamat="{{ $p->alamat }}"
                        data-email="{{ $p->email }}">Ubah
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-data"
                            data-nama_pelanggank="{{ $p->nama_pelanggan }}">Hapus
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
            $("#data-pelanggan").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-pelanggan .col-md-6:eq(0)');
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