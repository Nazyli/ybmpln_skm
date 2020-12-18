@extends('layouts.main')
@section('css')
    <style>
        .fontSelect {
            font-size: 10px;
            text-transform:capitalize;
        }

    </style>
@endsection
@section('title', 'Studi Kelayakan Mitra/SKM')
@section('breadcrumb', 'Home,Form,Studi Kelayakan Mitra')

@section('isi')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputnama3" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="nama" name="nama" class="form-control" id="inputnama3" placeholder="Nama Penerima">
                        </div>
                    </div>
                    <p class="text-center">
                        <a class="text-primary" data-toggle="collapse" href="#collapseExample" id="dataSekarang"
                            onclick=dataSekarang()>
                            Tambah Data Alamat Sekarang lebih rinci
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="form-group row">
                        <div class="col-sm-3">
                            <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi1">
                                <option value="">Select</option>
                                @foreach ($provinsi as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="kabupaten form-control fontSelect" style="width: 100%;" name="kabupaten1">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="kecamatan form-control fontSelect" style="width: 100%;" name="kecamatan1">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="desa form-control fontSelect" style="width: 100%;" name="desa1">
                                <option value="">Select</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputalamatsekarang3" class="col-sm-3 col-form-label">Alamat Sekarang</label>
                        <div class="col-sm-9">
                            <textarea name="alamatsekarang" class="form-control" id="inputalamatsekarang3"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <p class="text-center">
                        <a class="text-primary" data-toggle="collapse" href="#alamatasal" id="dataasal"
                            onclick=dataAsal()>
                            Tambah Data Alamat Asal lebih rinci
                        </a>
                    </p>
                    <div class="collapse" id="alamatasal">
                        <div class="form-group row">
                        <div class="col-sm-3">
                            <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi2">
                                <option value="">Select</option>
                                @foreach ($provinsi as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="kabupaten form-control fontSelect" style="width: 100%;" name="kabupaten2">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="kecamatan form-control fontSelect" style="width: 100%;" name="kecamatan2">
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="desa form-control fontSelect" style="width: 100%;" name="desa2">
                                <option value="">Select</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputalamatasal3" class="col-sm-3 col-form-label">Alamat &nbsp Asal</label>
                        <div class="col-sm-9">
                            <textarea name="alamatasal" class="form-control" id="inputalamatasal3" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputkm3" class="col-sm-3 col-form-label">KM</label>
                        <div class="col-sm-9">
                            <input type="km" name="km" class="form-control" id="inputkm3" placeholder="KM">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputprogram3" class="col-sm-3 col-form-label">Program</label>
                        <div class="col-sm-9">
                            <input type="program" name="program" class="form-control" id="inputprogram3"
                                placeholder="Program">
                        </div>
                    </div>
                    <div class="form-group row" id="simple-date1">
                        <label for="tanggalinput" class="col-sm-3 col-form-label">Tanggal Input</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" id="tanggalinput" name="tanggalinput">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputkm3" class="col-sm-3 col-form-label">KM</label>
                        <div class="col-sm-9">
                            <input type="km" name="km" class="form-control" id="inputkm3" placeholder="KM">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.provinsi').select2({
            placeholder: "Select Provinsi",
            allowClear: true,
            dropdownCssClass: "fontSelect",
        });
        $('.kabupaten').select2({
            placeholder: "Select Kabupaten",
            allowClear: true,
            dropdownCssClass: "fontSelect",
        });
        $('.kecamatan').select2({
            placeholder: "Select Kecamatan",
            allowClear: true,
            dropdownCssClass: "fontSelect",
        });
        $('.desa').select2({
            placeholder: "Select Desa",
            allowClear: true,
            dropdownCssClass: "fontSelect",
        });

        $('#simple-date1 .input-group.date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        }).datepicker("setDate", 'now');

        function dataSekarang() {
            let x = document.getElementById("dataSekarang");
            if (x.textContent == "Hapus Data") {
                x.innerHTML = "Tambah Data Alamat Sekarang lebih rinci";
            } else {
                x.innerHTML = "Hapus Data";
            }
        }
        function dataAsal() {
            let x = document.getElementById("dataasal");
            if (x.textContent == "Hapus Data") {
                x.innerHTML = "Tambah Data Alamat Asal lebih rinci";
            } else {
                x.innerHTML = "Hapus Data";
            }
        }
        $(document).ready(function() {
            $('select[name="provinsi1"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'kabupaten/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="kabupaten1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kabupaten1"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="kabupaten1"]').empty();
                }
            });
            $('select[name="kabupaten1"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'kecamatan/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="kecamatan1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kecamatan1"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="kecamatan1"]').empty();
                }
            });
            $('select[name="kecamatan1"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'desa/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="desa1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="desa1"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="desa1"]').empty();
                }
            });
            $('select[name="provinsi2"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'kabupaten/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="kabupaten2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kabupaten2"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="kabupaten2"]').empty();
                }
            });
            $('select[name="kabupaten2"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'kecamatan/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="kecamatan2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kecamatan2"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="kecamatan2"]').empty();
                }
            });
            $('select[name="kecamatan2"]').on('change', function() {
                var id = $(this).val();
                if(id) {
                    $.ajax({
                        url: 'desa/'+id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="desa2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="desa2"]').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });    
                        }
                    });
                }else{
                    $('select[name="desa2"]').empty();
                }
            });
        });
    </script>
    // Bootstrap Date Picker
    // Select2 Single with Placeholder
@endsection
