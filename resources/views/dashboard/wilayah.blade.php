@extends('layouts.main')
@section('title', 'Data Wilayah')
@section('breadcrumb', 'Home,Data Wlayah')

@section('css')
    <style>
        div.dataTables_paginate {
            display: none;
        }
        div.dataTables_length {
            display: none;
        }
        div.dts_label{
          display: none;

        }

    </style>
@endsection
@section('isi')
    <div class="row">
        <div class="col-lg-12 wilayah">
            <div class="card card mb-2">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showProvinsi">List Data
                            Provinsi</a></h6>
                    <div class="btn-group">
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                target="_blank"></i> Cetak </a>
                        <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                            data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                        </a>
                        <a data-toggle="collapse" href="#provinsi" aria-expanded="true" class="btn btn-primary btn-sm"
                            id="collapseProvinsi"><i class="fa fa-chevron-down pull-right"></i></a>
                    </div>
                </div>
                <div id="provinsi" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover display table-sm"
                                        id="tableProvinsi">
                                        <thead class="thead-light">
                                        </thead>
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
        function removeElement(elementId) {
            var element = document.getElementById(elementId);
            element.parentNode.removeChild(element);
        }
        $("#showProvinsi").click(function() {
            $("#provinsi").addClass('show');
            $("#collapseProvinsi").removeClass('collapsed');
            removeElement('divKabupaten');
            removeElement('divkecamatan');
            removeElement('divdesa');
        });

        $(function() {
            let columns = [{
                    "mData": null,
                    "title": "No",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "mData": null,
                    "title": "Provinsi",
                    "render": function(data, row, type, meta) {
                        return data.nama;
                    }
                },
                {
                    "mData": null,
                    "title": "Total",
                    "render": function(data, row, type, meta) {
                        return data.total;
                    }
                },
                {
                    "mData": null,
                    "title": "Action",
                    "render": function(data, row, type, meta) {
                        return '<a href="#divKabupaten" class="btn btn-outline-info btn-sm" onclick="showKabByprovID(\'' + data.id + '\',\'' + data.nama + '\')"> <i class="fas fa-info-circle fa-xl"></i></a> '
                    }
                },
            ];
            getDatatable('provinsi', '#tableProvinsi', columns);
        });

        function getDatatable(url, element, columns) {
            var t = $(element).DataTable({
                ajax: {
                    url: url,
                    type: 'GET',
                    dataSrc: function(json) {
                        return (json != null) ? json : "";
                    }
                },
                deferRender: true,
                sAjaxDataProp: "",
                timeout: 120000,
                scrollY: 200,
                scrollCollapse: true,
                scroller: true,
                scroller: {
                    loadingIndicator: true
                },
                "order": [
                    [0, "asc"]
                ],
                initComplete: function() {
                    this.api().row(1000).scrollTo();
                },
                "columns": columns,
                "oLanguage": {
                  "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                  "sProcessing": "Sedang memproses...",
                  "sLengthMenu": "Tampilkan _MENU_ entri",
                  "sZeroRecords": "Tidak ditemukan data yang sesuai",
                  "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                  "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                  "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                  "sInfoPostFix": "",
                  "sSearch": "Cari:",
                  "sUrl": "",
                  "oPaginate": {
                      "sFirst": "<i class='fas fa-sm fa-backward'></i>",
                      "sPrevious": "<i class='fas fa-sm fa-chevron-left'></i>",
                      "sNext": "<i class='fas fa-sm fa-chevron-right'></i>",
                      "sLast": "<i class='fas fa-sm fa-forward'></i>"
                  }
              }
            });

        }

        function showKabByprovID(id, nama) {
            $("#provinsi").removeClass('show');
            $("#collapseProvinsi").addClass('collapsed');
            let divKab = `
                                  <div class="col-lg-12 wilayah" id="divKabupaten">
                                    <div class="card card mb-2">
                                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showKabupaten">Data Kabupaten di `+nama+`</a></h6>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                                        target="_blank"></i> Cetak </a>
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                                                </a>
                                                <a data-toggle="collapse" href="#kabupaten" aria-expanded="true" class="btn btn-primary btn-sm"
                                                    id="collapseKabupaten"><i class="fa fa-chevron-down pull-right"></i></a>
                                            </div>
                                        </div>
                                        <div id="kabupaten" class="collapse show">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive p-3">
                                                            <table class="table align-items-center table-flush table-hover display table-sm"
                                                                id="tablekabupaten">
                                                                <thead class="thead-light">
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  `;

            $(".wilayah:last").after(divKab);
            let columns = [{
                    "mData": null,
                    "title": "No",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "mData": null,
                    "title": "Kabupaten",
                    "render": function(data, row, type, meta) {
                        return data.nama;
                    }
                },
                {
                    "mData": null,
                    "title": "Total",
                    "render": function(data, row, type, meta) {
                        return data.total;
                    }
                },
                {
                    "mData": null,
                    "title": "Action",
                    "render": function(data, row, type, meta) {
                        return '<a href="#divkecamatan" class="btn btn-outline-info btn-sm" onclick="showKecByKab(\'' + data.id + '\',\'' + data.nama + '\')"> <i class="fas fa-info-circle fa-xl"></i></a> '
                    }
                },
            ];
            getDatatable('kabupaten/' + id, '#tablekabupaten', columns);
            $("#showKabupaten").click(function() {
                $("#kabupaten").addClass('show');
                $("#collapseKabupaten").removeClass('collapsed');
                removeElement('divkecamatan');
                removeElement('divdesa');
            });

        }




        function showKecByKab(id, nama) {
            $("#kabupaten").removeClass('show');
            $("#collapseKabupaten").addClass('collapsed');
            let divKab = `
                                  <div class="col-lg-12 wilayah" id="divkecamatan">
                                    <div class="card card mb-2">
                                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showkecamatan">Data Kecamatan di `+nama+`</a></h6>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                                        target="_blank"></i> Cetak </a>
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                                                </a>
                                                <a data-toggle="collapse" href="#kecamatan" aria-expanded="true" class="btn btn-primary btn-sm"
                                                    id="collapsekecamatan"><i class="fa fa-chevron-down pull-right"></i></a>
                                            </div>
                                        </div>
                                        <div id="kecamatan" class="collapse show">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive p-3">
                                                            <table class="table align-items-center table-flush table-hover display table-sm"
                                                                id="tablekecamatan">
                                                                <thead class="thead-light">
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  `;

            $(".wilayah:last").after(divKab);
            let columns = [{
                    "mData": null,
                    "title": "No",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "mData": null,
                    "title": "Kecamatan",
                    "render": function(data, row, type, meta) {
                        return data.nama;
                    }
                },
                {
                    "mData": null,
                    "title": "Total",
                    "render": function(data, row, type, meta) {
                        return data.total;
                    }
                },
                {
                    "mData": null,
                    "title": "Action",
                    "render": function(data, row, type, meta) {
                        return '<a href="#divdesa" class="btn btn-outline-info btn-sm" onclick="showDesaByKec(\'' + data.id + '\',\'' + data.nama + '\')"> <i class="fas fa-info-circle fa-xl"></i></a> '
                    }
                },
            ];
            getDatatable('kecamatan/' + id, '#tablekecamatan', columns);

            $("#showkecamatan").click(function() {
                $("#kecamatan").addClass('show');
                $("#collapsekecamatan").removeClass('collapsed');
                removeElement('divdesa');
            });
        }



        function showDesaByKec(id, nama) {
            $("#kecamatan").removeClass('show');
            $("#collapsekecamatan").addClass('collapsed');
            let divKab = `
                                  <div class="col-lg-12 wilayah" id="divdesa">
                                    <div class="card card mb-2">
                                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary"><a href="#" id="showdesa">Data Desa di `+nama+`</a></h6>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan PDF" data-placement="top"><i class="far fa-file-pdf"
                                                        target="_blank"></i> Cetak </a>
                                                <a href="#" class="btn btn-primary btn-sm" data-trigger="hover" data-toggle="popover"
                                                    data-content="Cetak Laporan Excel" data-placement="top"><i class="far fa-file-excel"></i> Excel
                                                </a>
                                                <a data-toggle="collapse" href="#desa" aria-expanded="true" class="btn btn-primary btn-sm"
                                                    id="collapsedesa"><i class="fa fa-chevron-down pull-right"></i></a>
                                            </div>
                                        </div>
                                        <div id="desa" class="collapse show">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="table-responsive p-3">
                                                            <table class="table align-items-center table-flush table-hover display table-sm"
                                                                id="tabledesa">
                                                                <thead class="thead-light">
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  `;

            $(".wilayah:last").after(divKab);
            let columns = [{
                    "mData": null,
                    "title": "No",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "mData": null,
                    "title": "Desa",
                    "render": function(data, row, type, meta) {
                        return data.nama;
                    }
                },
                {
                    "mData": null,
                    "title": "Total",
                    "render": function(data, row, type, meta) {
                        return data.total;
                    }
                },
            ];
            getDatatable('desa/' + id, '#tabledesa', columns);

        }

    </script>
@endsection
