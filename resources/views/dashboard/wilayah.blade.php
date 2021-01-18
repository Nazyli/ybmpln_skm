@extends('layouts.main')
@section('title', 'Data Wilayah')
@section('breadcrumb', 'Home,Data Wlayah')

@section('isi')

    <div class="row">
        {{--  Provinsi  --}}
        <div class="col-lg-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showProvinsi">List Data Wilayah Provinsi</a></h6>
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                target="_blank"></i> Cetak </a>
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                        </a>
                        <a data-toggle="collapse" href="#provinsi" aria-expanded="true"
                            class="btn btn-primary btn-sm" id="collapseProvinsi"><i class="fa fa-chevron-down pull-right"></i></a>
                    </div>
                </div>
                <div id="provinsi" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover display datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Provinsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($provinsi as $key => $value)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->nama }}</td>
                                                    <td>
                                                        <button href="#"
                                                            class="btn btn-outline-info btn-sm infoProv"><i
                                                                class="fas fa-info-circle fa-xl"></i></button>
                                                        <div class="btn-group">
                                                            <form action="{{ route('wilayah.destroy', $value->id) }}"
                                                                method="POST" class="form-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button href="{{ route('wilayah.edit', $value->id) }}"
                                                                    class="btn btn-outline-primary btn-sm"><i
                                                                        class="fas fa-pencil-alt fa-xl"></i></button>
                                                            </form>
                                                        </div>
                                                        <a href="{{ route('wilayah.edit', $value->id) }}"
                                                            class="btn btn-outline-danger btn-sm"><i
                                                                class="fas fa-trash fa-xl"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Kabupaten  --}}
        <div class="col-lg-12">
          <div class="card card mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showProvinsi">List Data Wilayah Kabupaten</a></h6>
                  <div class="btn-group">
                      <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                          data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                              target="_blank"></i> Cetak </a>
                      <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                          data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                      </a>
                      <a data-toggle="collapse" href="#provinsi" aria-expanded="true"
                          class="btn btn-primary btn-sm" id="collapseProvinsi"><i class="fa fa-chevron-down pull-right"></i></a>
                  </div>
              </div>
              <div id="provinsi" class="collapse show">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="table-responsive p-3">
                                  <table class="table align-items-center table-flush table-hover display datatable">
                                      <thead class="thead-light">
                                          <tr>
                                              <th>No</th>
                                              <th>Name</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
@endsection
@section('js')
    <script>
      $('.infoProv').on('click', function () {
        $("#provinsi").removeClass("show");
        $("#collapseProvinsi").addClass("collapsed");
      })
      $('#showProvinsi').on('click', function () {
        $("#provinsi").addClass("show");
        $("#collapseProvinsi").removeClass("collapsed");
      })
    </script>
@endsection
