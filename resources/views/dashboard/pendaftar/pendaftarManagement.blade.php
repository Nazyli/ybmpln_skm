@extends('layouts.main')
@section('title', 'Pendaftar Management')
@section('breadcrumb', 'Home,Pendaftar Management;pendaftars')

@section('isi')

    <div class="row">
        <!-- ISI -->
        <div class="col-lg-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar SKM</h6>
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                target="_blank"></i> Cetak </a>
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                        </a>
                        <a data-toggle="collapse" href="#collapse-example" aria-expanded="true"
                            class="btn btn-primary btn-sm"><i class="fa fa-chevron-down pull-right"></i></a>
                    </div>
                </div>
                <div id="collapse-example" class="collapse show">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover datatable text-xs" id="">
                                <thead class="thead-light align-items-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Tanggal Input </th>
                                        <th>Keluarga</th>
                                        <th>Pendapatan</th>
                                        <th>Pengeluaran</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($survey as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-primary">{{ $value->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($value->tgl_input)->isoFormat('DD MMM Y hh:mm')}}</td>
                                            <td>{{ $value->total_keluarga }}</td>
                                            <td class="align-items-center">{{ $value->total_pendapatan }}</td>
                                            <td>{{ $value->total_pengeluaran }}</td>
                                            <td>
                                                @if (is_null($value->rekomendasi))
                                                <span class="badge badge-info">Processing</span>
                                                @elseif ($value->rekomendasi == 1)
                                                <span class="badge badge-success">Approved</span>
                                                @elseif ($value->rekomendasi == 0)
                                                <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <th>
                                              <div class="d-flex justify-content-around">
                                                <a href="#" class="btn btn-outline-info btn-xs infoProv"><i
                                                        class="fas fa-info-circle fa-xs"></i></a>
                                                <div class="btn-group">
                                                    <form action="{{ route('wilayah.destroy', $value->id) }}" method="POST"
                                                        class="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button href="{{ route('wilayah.edit', $value->id) }}"
                                                            class="btn btn-outline-primary btn-xs"><i
                                                                class="fas fa-pencil-alt fa-xs"></i></button>
                                                    </form>
                                                </div>
                                                <a href="{{ route('wilayah.edit', $value->id) }}"
                                                    class="btn btn-outline-danger btn-xs"><i
                                                        class="fas fa-trash fa-xs"></i></a>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
