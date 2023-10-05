<div class="modal fade" id="modalFormPembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pembelian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="pembelian">
              @csrf
              <div id="method"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Kode Masuk</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="kode_masuk" value="" name="kode_masuk">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="tanggal_masuk" value="" name="tanggal_masuk">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Total</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="total" value="" name="total">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Pemasok ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="pemasok_id" value="" name="pemasok_id">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">User ID</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="user_id" value="" name="user_id">
                </div>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
          </form>
    </div>
</div>