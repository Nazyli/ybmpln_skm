@extends('layouts.main')
@section('title','Data Wilayah')
@section('breadcrumb','Home,Data Wlayah')

@section('isi')

<div class="row">
    <!-- ISI -->
    <div class="col-lg-12">
      <div class="card card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Data Wilayah</h6>
          <div class="btn-group">
            <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover" data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf" target="_blank"></i> Cetak </a>
            <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover" data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel </a>
            <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" class="btn btn-primary btn-sm"><i class="fa fa-chevron-down pull-right"></i></a>
          </div>
        </div>
        <div id="collapse-example" class="collapse show">
          <div class="card-body">
            <!-- Row -->
          <div class="row">
            
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover display" id="datatable">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($provinsi as $key => $value )
                      <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{$value->nama}}</td>
                        <th><div class="media-body">
                            <div class="media-right">
                                <a class="btn btn-primary btn-sm btn-action mr-1"
                                    href="{{ route('wilayah.edit',$value->id) }}" data-toggle="tooltip"
                                    title="Edit"><i class="fas fa-pencil-alt fa-xl"></i></a>
                                <div class="btn-group">
                                    <form action="{{ route('wilayah.destroy',$value->id)}}" method="POST" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm btn-action"
                                            data-toggle="tooltip" title="Delete"><i
                                                class="fas fa-trash fa-xl"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div></th>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
          <!--Row-->
          </div>
        </div>
        <div class="card-footer text-muted">
          Footer
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
    $(document).ready( function () {
        var oTable = $('#datatable').dataTable( {
                       "bJQueryUI": true,
                       "sPaginationType": "full_numbers",
    
            //  "sDom": '<"clear">lfrtip' ,
    
                     "oLanguage": {
                        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                        "sProcessing":   "Sedang memproses...",
                        "sLengthMenu":   "Tampilkan _MENU_ entri",
                        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                        "sInfoPostFix":  "",
                        "sSearch":       "Cari:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "<i class='fas fa-sm fa-backward'></i>",
                            "sPrevious": "<i class='fas fa-sm fa-chevron-left'></i>",
                            "sNext":     "<i class='fas fa-sm fa-chevron-right'></i>",
                            "sLast":     "<i class='fas fa-sm fa-forward'></i>"
                        }
                    }
           } );
    });
  </script>
@endsection