@extends('layouts.main')
@section('title', 'User Management')
@section('breadcrumb', 'Home,User;usermanagement')

@section('isi')

    <div class="row">
        <!-- ISI -->
        <div class="col-lg-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Data User</h6>
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
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-primary">{{ $value->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($value->created_at)->isoFormat('DD MMM Y hh:mm') }}
                                        </td>
                                        <td>
                                            @if ($value->role == 'admin')
                                                <span class="badge badge-primary">Administrator</span>
                                            @elseif($value->role =='petugas')
                                                <span class="badge badge-info">Petugas</span>
                                            @else
                                                <span class="badge badge-danger">{{ $value->role }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (Cache::has('user-is-online-' . $value->id))
                                                <span class="text-success">Online</span>
                                            @else
                                                <span class="text-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($value->last_seen)->diffForHumans() }}</td>
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
