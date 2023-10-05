<div class="modal fade" id="formpelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="produk">
        @csrf
        <div id="method"></div>
        <!-- <div class="form-group row">
            <label for="no" class="col-sm-4 col-form-label">No</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="no" value="" name="no">
            </div>
        </div> -->
        <div class="form-group row">
            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="kode" value="" name="kode">
            </div>
        </div>
        <div class="form-group row">
        <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_pelanggan" value="" name="nama_pelanggan"></div>
        </div>
        <div class="form-group row">
        <label for="no_telp" class="col-sm-4 col-form-label">No_telp</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="no_telp" value="" name="no_telp"> </div>
        </div>
        <div class="form-group row">
            <label for="Alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="alamat" value="" name="alamat"></div>
        </div>
      <div class="modal-footer">
      </div>
      <div class="form-group row">
            <label for="Email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="email" value="" name="email"></div></div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>