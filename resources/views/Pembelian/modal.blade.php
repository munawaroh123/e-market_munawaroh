<div class
="modal fade" id="tblBarangModal" tabindex="-1" role="dialogue" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Data Barang</h1>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-stripped table-compact" id="tblBarang2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $b->kode }}</td>
                                <td>{{ $b->nama_barang }}</td>
                                <td>{{ $b->harga }}</td>
                                <td><button class="pilihBarangBtn">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>