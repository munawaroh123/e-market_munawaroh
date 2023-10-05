@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">pelanggan</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
 <div class="card-body">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formpelangganModal">
        Tambah pelanggan
    </button>
  </div>
@include('pelanggan.data')
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
      </div>
  <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('pelanggan.form')
</section>

@endsection

@push('script')
    <script>
      console.log('pelanggan ')
      // $('tbl-data-pelanggan').DataTable()

        $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
            $('.alert-success').slideUp(500)
        })

      $('.delete-data').on('click', function(e){
        // preventDefault()
        let data = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
          html: `Apakah data <span style="color:red">${data}</span> akan dihapus??`,
          title: "Hapus data",
          icon: 'error',
          showDenyButton: true,
          confirmButton: 'Ya',
          denyButtonText: 'Tidak' ,
          focusConfirm: false         
        }).then((result)=>{
          if(result.isConfirmed)
            $(e.target).closest('form').submit()
          else swal.close()
        })

      })
      
      $('#formpelangganModal').on('show.bs.modal', function(e){
        const btn = $(e.relatedTarget)
        console.log(btn.data('mode'))
        const mode =btn.data('mode')
        const kode =btn.data('kode')
        const nama_pelanggan =btn.data('nama_pelanggan')
        const no_telp =btn.data('no_telp')
        const alamat =btn.data('alamat')
        const email =btn.data('email')
        const id= btn.data('id')
        const modal =$(this)
      if(mode == 'edit'){
        modal.find('.modal-title').text('Edit Data pelanggan')
        modal.find('#kode').val(kode)
        modal.find('#nama_pelanggan').val(nama_pelanggan)
        modal.find('#no_telp').val(no_telp)
        modal.find('#alamat').val(alamat)
        modal.find('#email').val(email)
        modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}/'+id)
        modal.find('#method').html('@method("PATCH")')
      }else{
        modal.find('.modal-title').text('Input Data pelanggan')
        modal.find('#nama_pelanggan').val('')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("pelanggan") }}')
        
      }
      })
    </script>
@endpush