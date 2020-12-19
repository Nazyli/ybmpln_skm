@extends('layouts.main')
@section('css')
    <style>
        .fontSelect {
            font-size: 10px;
            text-transform: capitalize;
        }

        #breadcrumbSekarang {
            margin-bottom: -10px;
        }

        #breadcrumbAsal {
            margin-bottom: -10px;
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
                            <div class="col-sm-12">
                                <ol class="breadcrumb justify-content-center" id="breadcrumbSekarang">
                                </ol>
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
                        <a class="text-primary" data-toggle="collapse" href="#alamatasal" id="dataasal" onclick=dataAsal()>
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
                            <div class="col-sm-12">
                                <ol class="breadcrumb justify-content-center" id="breadcrumbAsal">
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputalamatasal3" class="col-sm-3 col-form-label">Alamat &nbsp Asal</label>
                        <div class="col-sm-9">
                            <textarea name="alamatasal" class="form-control" id="inputalamatasal3" rows="3"></textarea>
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

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Indeks Rumah Asal</h6>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Ukuran Rumah ( m<sup>2</sup>/orang )
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="ukuranRumah1" name="ukuranRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="ukuranRumah1">Sangat kecil ( < 4 m<sup>
                                            2</sup>)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="ukuranRumah2" name="ukuranRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="ukuranRumah2">Kecil (4 – 6
                                        m<sup>2</sup>)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="ukuranRumah3" name="ukuranRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="ukuranRumah3">Sedang (6 – 8
                                        m<sup>2</sup>)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="ukuranRumah4" name="ukuranRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="ukuranRumah4">Besar ( > 8
                                        m<sup>2</sup>)</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Dinding
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dinding1" name="dinding" class="custom-control-input">
                                    <label class="custom-control-label" for="dinding1">Bilik bambu/Kayu</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dinding2" name="dinding" class="custom-control-input">
                                    <label class="custom-control-label" for="dinding2">Semi</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dinding3" name="dinding" class="custom-control-input">
                                    <label class="custom-control-label" for="dinding3">Gypusm</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dinding4" name="dinding" class="custom-control-input">
                                    <label class="custom-control-label" for="dinding4">Tembok/Beton</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Lantai
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lantai1" name="lantai" class="custom-control-input">
                                    <label class="custom-control-label" for="lantai1">Tanah</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lantai2" name="lantai" class="custom-control-input">
                                    <label class="custom-control-label" for="lantai2">Panggung</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lantai3" name="lantai" class="custom-control-input">
                                    <label class="custom-control-label" for="lantai3">Semen</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="lantai4" name="lantai" class="custom-control-input">
                                    <label class="custom-control-label" for="lantai4">Keramik</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Atap
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="atap1" name="atap" class="custom-control-input">
                                    <label class="custom-control-label" for="atap1">Kirai/Ijuk</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="atap2" name="atap" class="custom-control-input">
                                    <label class="custom-control-label" for="atap2">Genteng/Seng</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="atap3" name="atap" class="custom-control-input">
                                    <label class="custom-control-label" for="atap3">Asbes/Berglazur</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Kepemilikan Rumah
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah1" name="kepemilikanRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah1">Menumpang</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah2" name="kepemilikanRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah2">Kontrak</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah3" name="kepemilikanRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah3">Keluarga</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah4" name="kepemilikanRumah" class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah4">Sendiri</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Dapur
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dapur1" name="dapur" class="custom-control-input">
                                    <label class="custom-control-label" for="dapur1">Tungku</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dapur2" name="dapur" class="custom-control-input">
                                    <label class="custom-control-label" for="dapur2">Kompor Minyak</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="dapur3" name="dapur" class="custom-control-input">
                                    <label class="custom-control-label" for="dapur3">Kompor Gas/Listrik</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Kursi
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kursi1" name="kursi" class="custom-control-input">
                                    <label class="custom-control-label" for="kursi1">Lesehan</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kursi2" name="kursi" class="custom-control-input">
                                    <label class="custom-control-label" for="kursi2">Balai Bambu</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kursi3" name="kursi" class="custom-control-input">
                                    <label class="custom-control-label" for="kursi3">Kayu</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kursi4" name="kursi" class="custom-control-input">
                                    <label class="custom-control-label" for="kursi4">Sofa</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kepemilikan Aset Pribadi</h6>
                </div>
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Kebun / Sawah
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kebun1" name="kebun" class="custom-control-input">
                                    <label class="custom-control-label" for="kebun1">Tidak Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kebun2" name="kebun" class="custom-control-input">
                                    <label class="custom-control-label" for="kebun2">< 1000 m<sup>2</sup></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kebun3" name="kebun" class="custom-control-input">
                                    <label class="custom-control-label" for="kebun3">1000 - 5000 m<sup>2</sup></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kebun4" name="kebun" class="custom-control-input">
                                    <label class="custom-control-label" for="kebun4">> 5000 m<sup>2</sup></label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Elektronik
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="elektronik1" name="elektronik" class="custom-control-input">
                                    <label class="custom-control-label" for="elektronik1">Radio</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="elektronik2" name="elektronik" class="custom-control-input">
                                    <label class="custom-control-label" for="elektronik2">Tape</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="elektronik3" name="elektronik" class="custom-control-input">
                                    <label class="custom-control-label" for="elektronik3">Televisi</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="elektronik4" name="elektronik" class="custom-control-input">
                                    <label class="custom-control-label" for="elektronik4">CD. Player</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="elektronik5" name="elektronik" class="custom-control-input">
                                    <label class="custom-control-label" for="elektronik5">Kulkas</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Kendaraan
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kendaraan1" name="kendaraan" class="custom-control-input">
                                    <label class="custom-control-label" for="kendaraan1">Tidak Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kendaraan2" name="kendaraan" class="custom-control-input">
                                    <label class="custom-control-label" for="kendaraan2">Sepeda Kayuh</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kendaraan3" name="kendaraan" class="custom-control-input">
                                    <label class="custom-control-label" for="kendaraan3">Sepeda Motor</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kendaraan4" name="kendaraan" class="custom-control-input">
                                    <label class="custom-control-label" for="kendaraan4">Sepeda Motor</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <div class="col-sm-3">Ternak</div>
                        <div class="col-sm-9">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ternak1">
                            <label class="custom-control-label" for="ternak1">Unggas 
                            </label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ternak2">
                            <label class="custom-control-label" for="ternak2">Unggas (.....ekor)</label>
                          </div>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="ternak3">
                            <label class="custom-control-label" for="ternak3">Unggas (.....ekor)</label>
                          </div>
                        </div>
                      </div>
                      {{--  <div class="form-group">
                        <input id="ternak" type="text" class="form-control">
                      </div>  --}}
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Simpanan
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="simpanan1" name="simpanan" class="custom-control-input">
                                    <label class="custom-control-label" for="simpanan1">Ada</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="simpanan2" name="simpanan" class="custom-control-input">
                                    <label class="custom-control-label" for="simpanan2">Tidak Ada</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#ternak').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
          });
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
                $("#breadcrumbSekarang li").remove();
                $('select[name="provinsi1"]').empty();
                $('select[name="kabupaten1"]').empty();
                $('select[name="kecamatan1"]').empty();
                $('select[name="desa1"]').empty();
            } else {
                x.innerHTML = "Hapus Data";
            }
        }

        function dataAsal() {
            let x = document.getElementById("dataasal");
            if (x.textContent == "Hapus Data") {
                x.innerHTML = "Tambah Data Alamat Asal lebih rinci";
                $("#breadcrumbAsal li").remove();
                $('select[name="provinsi2"]').empty();
                $('select[name="kabupaten2"]').empty();
                $('select[name="kecamatan2"]').empty();
                $('select[name="desa2"]').empty();
            } else {
                x.innerHTML = "Hapus Data";
            }
        }

        function breadcrumbSekarang() {
            $("#breadcrumbSekarang li").remove();
            let p = document.getElementsByName("provinsi1")[0];
            let k = document.getElementsByName("kabupaten1")[0];
            let ke = document.getElementsByName("kecamatan1")[0];
            let d = document.getElementsByName("desa1")[0];
            $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + p.options[p.selectedIndex].text + '</li>');
            if (k.length >= 1) {
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + k.options[k.selectedIndex].text + '</li>');
            }
            if (ke.length >= 1) {
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + ke.options[ke.selectedIndex].text +
                    '</li>');
            }
            if (d.length >= 1) {
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + d.options[d.selectedIndex].text + '</li>');
            }
        }

        function breadcrumbAsal() {
            $("#breadcrumbAsal li").remove();
            let p = document.getElementsByName("provinsi2")[0];
            let k = document.getElementsByName("kabupaten2")[0];
            let ke = document.getElementsByName("kecamatan2")[0];
            let d = document.getElementsByName("desa2")[0];
            $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + p.options[p.selectedIndex].text + '</li>');
            if (k.length >= 1) {
                $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + k.options[k.selectedIndex].text + '</li>');
            }
            if (ke.length >= 1) {
                $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + ke.options[ke.selectedIndex].text + '</li>');
            }
            if (d.length >= 1) {
                $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + d.options[d.selectedIndex].text + '</li>');
            }
        }
        $(document).ready(function() {
            $('select[name="provinsi1"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'kabupaten/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="kabupaten1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kabupaten1"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kabupaten1"]').empty();
                }
                breadcrumbSekarang();
            });
            $('select[name="kabupaten1"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'kecamatan/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="kecamatan1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kecamatan1"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kecamatan1"]').empty();
                }
                breadcrumbSekarang();
            });
            $('select[name="kecamatan1"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'desa/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="desa1"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="desa1"]').append('<option value="' +
                                    value.id + '">' + value.nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="desa1"]').empty();
                }
                breadcrumbSekarang();
            });
            $('select[name="desa1"]').on('change', function() {
                breadcrumbSekarang();
            });
            $('select[name="provinsi2"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'kabupaten/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="kabupaten2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kabupaten2"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kabupaten2"]').empty();
                }
                breadcrumbAsal()
            });
            $('select[name="kabupaten2"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'kecamatan/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="kecamatan2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="kecamatan2"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="kecamatan2"]').empty();
                }
                breadcrumbAsal()
            });
            $('select[name="kecamatan2"]').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: 'desa/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="desa2"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="desa2"]').append('<option value="' +
                                    value.id + '">' + value.nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="desa2"]').empty();
                }
                breadcrumbAsal()
            });
            $('select[name="desa2"]').on('change', function() {
                breadcrumbAsal();
            });
        });

    </script>
    // Bootstrap Date Picker
    // Select2 Single with Placeholder
@endsection
