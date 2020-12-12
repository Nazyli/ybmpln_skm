@extends('layouts.main')
@section('title','Dashboard')
@section('breadcrumb','Home,Pages,Blank Page')

@section('isi')

<div class="row">
    <!-- ISI -->
    <div class="col-lg-12">
      <div class="card card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
          <div class="btn-group">
            <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover" data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf" target="_blank"></i> Cetak </a>
            <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover" data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel </a>
            <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" class="btn btn-primary btn-sm"><i class="fa fa-chevron-down pull-right"></i></a>
          </div>
        </div>
        <div id="collapse-example" class="collapse show">
          <div class="card-body">
            
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon
            officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
            Brunch 3
            wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch
            et.
            Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad
            vegan
            excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
            nesciunt
            you probably havent heard of them accusamus labore sustainable VHS.
          </div>
        </div>
        <div class="card-footer text-muted">
          Footer
        </div>
      </div>
    </div>
  </div>
@endsection
