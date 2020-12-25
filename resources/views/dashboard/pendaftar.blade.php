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
    <form id="pendaftar" method="POST" action="{{ route('pendaftar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputnama3" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputnama3"
                                    placeholder="Nama Penerima">
                            </div>
                        </div>
                        <p class="text-center">
                            <a class="text-primary" data-toggle="collapse" href="#collapseExample" id="dataSekarang">
                                Tambah Data Alamat Sekarang lebih rinci
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                    <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi1">
                                        <option value="">Select</option>
                                        @foreach ($provinsi as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="kabupaten form-control fontSelect" style="width: 100%;"
                                        name="kabupaten1">
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="kecamatan form-control fontSelect" style="width: 100%;"
                                        name="kecamatan1">
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="desa form-control fontSelect" style="width: 100%;" name="desa1">
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
                            <a class="text-primary" data-toggle="collapse" href="#alamatasal" id="dataAsal">
                                Tambah Data Alamat Asal lebih rinci
                            </a>
                        </p>
                        <div class="collapse" id="alamatasal">
                            <div class="form-group row">
                                <div class="col-sm-3 mb-1">
                                    <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi2">
                                        <option value="">Select</option>
                                        @foreach ($provinsi as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="kabupaten form-control fontSelect" style="width: 100%;"
                                        name="kabupaten2">
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="kecamatan form-control fontSelect" style="width: 100%;"
                                        name="kecamatan2"></select>
                                </div>
                                <div class="col-sm-3 mb-1">
                                    <select class="desa form-control fontSelect" style="width: 100%;" name="desa2"></select>
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
                            <label for="inputprogram3" class="col-sm-3 col-form-label">Nama Program</label>
                            <div class="col-sm-9">
                                <input type="text" name="program" class="form-control" id="inputprogram3"
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
                            <label class="col-sm-3 col-form-label">KM</label>
                            <div class="col-sm-9">
                                <input type="text" name="km" class="form-control" placeholder="KM">
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
                                        <input type="radio" id="ukuranRumah1" name="ukuranRumah"
                                            class="custom-control-input" value="Sangat kecil (< 4 m<sup>2</sup>)">
                                        <label class="custom-control-label" for="ukuranRumah1">Sangat kecil ( < 4 m<sup>
                                                2</sup>)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ukuranRumah2" name="ukuranRumah"
                                            class="custom-control-input" value="Kecil (4 - 6 m<sup>2</sup>)">
                                        <label class="custom-control-label" for="ukuranRumah2">Kecil (4 - 6
                                            m<sup>2</sup>)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ukuranRumah3" name="ukuranRumah"
                                            class="custom-control-input" value="Sedang (6 - 8 m<sup>2</sup>)">
                                        <label class="custom-control-label" for="ukuranRumah3">Sedang (6 - 8
                                            m<sup>2</sup>)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="ukuranRumah4" name="ukuranRumah"
                                            class="custom-control-input" value="Besar (> 8 m<sup>2</sup>)">
                                        <label class="custom-control-label" for="ukuranRumah4">Besar (> 8
                                            m<sup>2</sup>)</label>
                                    </div>
                                    <label for="ukuranRumah" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Dinding
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dinding1" name="dinding" class="custom-control-input"
                                            value="Bilik bambu/Kayu">
                                        <label class="custom-control-label" for="dinding1">Bilik bambu/Kayu</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dinding2" name="dinding" class="custom-control-input"
                                            value="Semi">
                                        <label class="custom-control-label" for="dinding2">Semi</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dinding3" name="dinding" class="custom-control-input"
                                            value="Gypusm">
                                        <label class="custom-control-label" for="dinding3">Gypusm</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dinding4" name="dinding" class="custom-control-input"
                                            value="Tembok/Beton">
                                        <label class="custom-control-label" for="dinding4">Tembok/Beton</label>
                                    </div>
                                    <label for="dinding" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Lantai
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="lantai1" name="lantai" class="custom-control-input"
                                            value="Tanah">
                                        <label class="custom-control-label" for="lantai1">Tanah</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="lantai2" name="lantai" class="custom-control-input"
                                            value="Panggung">
                                        <label class="custom-control-label" for="lantai2">Panggung</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="lantai3" name="lantai" class="custom-control-input"
                                            value="Semen">
                                        <label class="custom-control-label" for="lantai3">Semen</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="lantai4" name="lantai" class="custom-control-input"
                                            value="Keramik">
                                        <label class="custom-control-label" for="lantai4">Keramik</label>
                                    </div>
                                    <label for="lantai" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Atap
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="atap1" name="atap" class="custom-control-input"
                                            value="Kirai/Ijuk<">
                                        <label class="custom-control-label" for="atap1">Kirai/Ijuk</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="atap2" name="atap" class="custom-control-input"
                                            value="Genteng/Seng">
                                        <label class="custom-control-label" for="atap2">Genteng/Seng</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="atap3" name="atap" class="custom-control-input"
                                            value="Asbes/Berglazur">
                                        <label class="custom-control-label" for="atap3">Asbes/Berglazur</label>
                                    </div>
                                    <label for="atap" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Kepemilikan Rumah
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kepemilikanRumah1" name="kepemilikanRumah"
                                            class="custom-control-input" value="Menumpang">
                                        <label class="custom-control-label" for="kepemilikanRumah1">Menumpang</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kepemilikanRumah2" name="kepemilikanRumah"
                                            class="custom-control-input" value="Kontrak">
                                        <label class="custom-control-label" for="kepemilikanRumah2">Kontrak</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kepemilikanRumah3" name="kepemilikanRumah"
                                            class="custom-control-input" value="Keluarga">
                                        <label class="custom-control-label" for="kepemilikanRumah3">Keluarga</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kepemilikanRumah4" name="kepemilikanRumah"
                                            class="custom-control-input" value="Sendiri">
                                        <label class="custom-control-label" for="kepemilikanRumah4">Sendiri</label>
                                    </div>
                                    <label for="kepemilikanRumah" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Dapur
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dapur1" name="dapur" class="custom-control-input"
                                            value="Tungku">
                                        <label class="custom-control-label" for="dapur1">Tungku</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dapur2" name="dapur" class="custom-control-input"
                                            value="Kompor Minyak">
                                        <label class="custom-control-label" for="dapur2">Kompor Minyak</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="dapur3" name="dapur" class="custom-control-input"
                                            value="Kompor Gas/Listrik">
                                        <label class="custom-control-label" for="dapur3">Kompor Gas/Listrik</label>
                                    </div>
                                    <label for="dapur" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Kursi
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kursi1" name="kursi" class="custom-control-input"
                                            value="Lesehan">
                                        <label class="custom-control-label" for="kursi1">Lesehan</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kursi2" name="kursi" class="custom-control-input"
                                            value="Balai Bambu">
                                        <label class="custom-control-label" for="kursi2">Balai Bambu</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kursi3" name="kursi" class="custom-control-input"
                                            value="Kayu">
                                        <label class="custom-control-label" for="kursi3">Kayu</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kursi4" name="kursi" class="custom-control-input"
                                            value="Sofa">
                                        <label class="custom-control-label" for="kursi4">Sofa</label>
                                    </div>
                                    <label for="kursi" class="invalid-feedback"></label>
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
                                        <input type="radio" id="kebun1" name="kebun" class="custom-control-input"
                                            value="Tidak Ada">
                                        <label class="custom-control-label" for="kebun1">Tidak Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kebun2" name="kebun" class="custom-control-input"
                                            value="< 1000 m<sup>2</sup>">
                                        <label class="custom-control-label" for="kebun2">
                                            < 1000 m<sup>2</sup>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kebun3" name="kebun" class="custom-control-input"
                                            value="1000 - 5000 m<sup>2</sup>">
                                        <label class="custom-control-label" for="kebun3">1000 - 5000 m<sup>2</sup></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kebun4" name="kebun" class="custom-control-input"
                                            value="> 5000 m<sup>2</sup>">
                                        <label class="custom-control-label" for="kebun4">> 5000 m<sup>2</sup></label>
                                    </div>
                                    <label for="kebun" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Elektronik
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="elektronik1" name="elektronik" class="custom-control-input"
                                            value="Radio">
                                        <label class="custom-control-label" for="elektronik1">Radio</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="elektronik2" name="elektronik" class="custom-control-input"
                                            value="Tape">
                                        <label class="custom-control-label" for="elektronik2">Tape</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="elektronik3" name="elektronik" class="custom-control-input"
                                            value="Televisi">
                                        <label class="custom-control-label" for="elektronik3">Televisi</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="elektronik4" name="elektronik" class="custom-control-input"
                                            value="CD. Player">
                                        <label class="custom-control-label" for="elektronik4">CD. Player</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="elektronik5" name="elektronik" class="custom-control-input"
                                            value="Kulkas">
                                        <label class="custom-control-label" for="elektronik5">Kulkas</label>
                                    </div>
                                    <label for="elektronik" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Kendaraan
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kendaraan1" name="kendaraan" class="custom-control-input"
                                            value="Tidak Ada">
                                        <label class="custom-control-label" for="kendaraan1">Tidak Ada</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kendaraan2" name="kendaraan" class="custom-control-input"
                                            value="Sepeda Kayuh">
                                        <label class="custom-control-label" for="kendaraan2">Sepeda Kayuh</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kendaraan3" name="kendaraan" class="custom-control-input"
                                            value="Sepeda Motor">
                                        <label class="custom-control-label" for="kendaraan3">Sepeda Motor</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="kendaraan4" name="kendaraan" class="custom-control-input"
                                            value="Mobil">
                                        <label class="custom-control-label" for="kendaraan4">Mobil</label>
                                    </div>
                                    <label for="kendaraan" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-3">Ternak</div>
                            <div class="col-sm-9">
                                <div class="form-group row">
                                    <div class="col-sm-6">Unggas</div>
                                    <div class="col-sm-6">
                                        <input name="unggas" type="number" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">Kambing/Domba</div>
                                    <div class="col-sm-6">
                                        <input name="kambing" type="number" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">Sapi/Kerbau</div>
                                    <div class="col-sm-6">
                                        <input name="sapi" type="number" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Simpanan
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="simpanan1" name="simpanan" class="custom-control-input">
                                        <label class="custom-control-label" for="simpanan1">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="nilaiSimpanan">
                                            </div>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="simpanan2" name="simpanan" class="custom-control-input"
                                            value="0">
                                        <label class="custom-control-label" for="simpanan2">Tidak Ada</label>
                                    </div>
                                    <label for="simpanan" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aset Produktif</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jenisAset">Sebutkan jenisnya : </label>
                            <textarea class="form-control" id="jenisAset" name="jenisAset" rows="3"></textarea>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0">Penggunaan aset produktif
                                </legend>
                                <div class="col-sm-9">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gunaAset1" name="gunaAset" class="custom-control-input"
                                            value="Bertambahnya aset produktif">
                                        <label class="custom-control-label" for="gunaAset1">Bertambahnya aset
                                            produktif</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gunaAset2" name="gunaAset" class="custom-control-input"
                                            value="Investasi usaha lain">
                                        <label class="custom-control-label" for="gunaAset2">Investasi usaha lain</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="gunaAset3" name="gunaAset" class="custom-control-input"
                                            value="Investasi usaha turunan">
                                        <label class="custom-control-label" for="gunaAset3">Investasi usaha turunan</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Profil Keluarga</h6>
                        <button type="button" class="btn btn-primary btn-sm" id="addDataKeluarga" data-trigger="hover"
                            data-toggle="popover" data-content="Tambah Form Keluarga" data-placement="top">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="dataKeluarga"></div>
                            <div class="col-lg-6 dataKeluarga" id="dataKeluarga">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Keluarga 1</h6>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="javascript:removeElement('dataKeluarga');">
                                            <i class="fas fa-xs fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="namaKeluarga[]" class="form-control"
                                                    id="namaKeluarga" placeholder="Nama Keluarga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Umur</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="umur[]" class="form-control" placeholder="Umur"
                                                    min="1" id="umur">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Hubungan</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="hubungan form-control" name="hubungan[]" id="hubungan">
                                                        <option value="" selected disabled>Hubungan Dalam Keluarga</option>
                                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                        <option value="Suami">Suami</option>
                                                        <option value="Istri">Istri</option>
                                                        <option value="Anak">Anak</option>
                                                        <option value="Menantu">Menantu</option>
                                                        <option value="Cucu">Cucu</option>
                                                        <option value="Orang Tua">Orang Tua</option>
                                                        <option value="Mertua">Mertua</option>
                                                        <option value="Famili">Famili</option>
                                                        <option value="Pembantu">Pembantu</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="status form-control" name="status[]" id="status">
                                                        <option value="" selected disabled>Status Perkawinan</option>
                                                        <option value="Kawin">Kawin</option>
                                                        <option value="Belum Kawin">Belum Kawin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-center" style="margin-top:-15px;">
                                                Pekerjaan
                                            </p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Pekerjaan Utama"
                                                        name="pekerjaanUtama[]" id="pekerjaanUtama">

                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control"
                                                        placeholder="Pekerjaan Sampingan" name="pekerjaanSampingan[]">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pendidikan</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <select class="pendidikan form-control" name="pendidikan[]"
                                                        id="pendidikan">
                                                        <option value="" selected disabled>Pendidikan Terakhir</option>
                                                        <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
                                                        <option value="Belum Tamat SD / Sederajat">Belum Tamat SD /
                                                            Sederajat
                                                        </option>
                                                        <option value="Tamat SD / Sederajat">Tamat SD / Sederajat</option>
                                                        <option value="SLTP / Sederajat">SLTP / Sederajat</option>
                                                        <option value="SLTA / Sederajat">SLTA / Sederajat</option>
                                                        <option value="Diploma I">Diploma I / II</option>
                                                        <option value="Akademi / Diploma III / S. Muda">Akademi / Diploma
                                                            III /
                                                            S. Muda</option>
                                                        <option value="Diploma IV / Strata I">Diploma IV / Strata I</option>
                                                        <option value="Strata II">Strata II</option>
                                                        <option value="Strata III">Strata III</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-9">
                                                <textarea name="keteranganKeluarga[]" class="form-control"
                                                    rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Keuangan Keluarga</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Pendapatan Keluarga</h6>
                                        <button type="button" class="btn btn-primary btn-sm" id="addPendapatanKeluarga"
                                            data-trigger="hover" data-toggle="popover"
                                            data-content="Tambah Data Pendapatan Keluarga" data-placement="top">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row penghasilan">
                                            <label class="col-sm-6 col-form-label">Penghasilan Usaha Pokok</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="penghasilanPokok"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row penghasilan">
                                            <label class="col-sm-6 col-form-label">Penghasilan Usaha Simpanan</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="penghasilanSimpanan"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row penghasilan">
                                            <label class="col-sm-6 col-form-label">Penghasilan Istri/Suami</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="penghasilanSuami"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row penghasilan">
                                            <label class="col-sm-6 col-form-label">Penghasilan Anak/Menantu</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="penghasilanAnak"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Rutin Keluarga</h6>
                                        <button type="button" class="btn btn-primary btn-sm" id="addPengeluaranKeluarga"
                                            data-trigger="hover" data-toggle="popover"
                                            data-content="Tambah Data Pengeluaran Rutin Keluarga" data-placement="top">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row pengeluaran">
                                            <label class="col-sm-6 col-form-label">Kebutuhan Dapur</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="kebutuhanDapur"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row pengeluaran">
                                            <label class="col-sm-6 col-form-label">Pendidikan</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="pengeluaranPendidikan"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row pengeluaran">
                                            <label class="col-sm-6 col-form-label">Kesehatan</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="pengeluaranKesehatan"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row pengeluaran">
                                            <label class="col-sm-6 col-form-label">Transportasi</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="pengeluaranTransportasi"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row pengeluaran">
                                            <label class="col-sm-6 col-form-label">Iuran Rutin (Listrik, Siskamling,
                                                PAM)</label>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" name="pengeluaranIuranRutin"
                                                        placeholder="Rp/*hari/bulan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Keterlibatan Dalam Program Lain</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Apakah pernah melakukan peminjaman dana sebelumnya
                                ?</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="isPinjam1" name="isPinjam" class="custom-control-input"
                                                value="Ya">
                                            <label class="custom-control-label" for="isPinjam1">Ya</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="isPinjam2" name="isPinjam" class="custom-control-input"
                                                value="Tidak">
                                            <label class="custom-control-label" for="isPinjam2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="isPinjam" class="invalid-feedback"></label>
                            </div>
                        </div>
                        <div id="formIsPinjam">
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Jika Ya, lembaga apa yang memberi pinjaman ?</label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio ">
                                                <input type="radio" id="namaLembaga1" name="namaLembaga"
                                                    class="custom-control-input" value="Bank">
                                                <label class="custom-control-label" for="namaLembaga1">Bank</label>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="namaLembaga2" name="namaLembaga"
                                                    class="custom-control-input" value="Koperasi">
                                                <label class="custom-control-label" for="namaLembaga2">Koperasi</label>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="namaLembaga3" name="namaLembaga"
                                                    class="custom-control-input" value="">
                                                <label class="custom-control-label" for="namaLembaga3">
                                                    <input type="text" class="form-control form-control-sm"
                                                        style="margin-top:-5px;" name="namaLembagaInput">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="namaLembaga" class="invalid-feedback"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Berapa besar anda meminjam pada lembaga tersebut
                                    ?</label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="besarPinjaman"
                                                    placeholder="Banyaknya Pinjaman">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Bagaimana cara anda mengembalikan dana yang dipinjam
                                    ?</label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio ">
                                                <input type="radio" id="caraPengembalian1" name="caraPengembalian"
                                                    class="custom-control-input" value="Diangsur/Dicicil">
                                                <label class="custom-control-label"
                                                    for="caraPengembalian1">Diangsur/Dicicil</label>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="caraPengembalian2" name="caraPengembalian"
                                                    class="custom-control-input" value="Jatuh Tempo">
                                                <label class="custom-control-label" for="caraPengembalian2">Jatuh
                                                    Tempo</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="caraPengembalian" class="invalid-feedback"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Berapa lama masa pinjaman anda ?</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="p-2 bd-highlight">
                                                <input type="number" class="form-control form-control-sm" name="lamaPinjam"
                                                    placeholder="Lama pinjam">
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="d-flex flex-row bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio ">
                                                        <input type="radio" id="pinjamPer1" name="pinjamPer"
                                                            class="custom-control-input" value="Minggu">
                                                        <label class="custom-control-label" for="pinjamPer1">Minggu</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="pinjamPer2" name="pinjamPer"
                                                            class="custom-control-input" value="Bulan">
                                                        <label class="custom-control-label" for="pinjamPer2">Bulan</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="pinjamPer3" name="pinjamPer"
                                                            class="custom-control-input" value="Tahun">
                                                        <label class="custom-control-label" for="pinjamPer3">Tahun</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="pinjamPer" class="invalid-feedback"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Berapa total dana yang harus anda kembalikan pada
                                    masa
                                    itu
                                    ?</label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="totalPinjam"
                                                    placeholder="Total Pinjaman">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Apakah pinjaman tersebut saat ini sudah Lunas
                                    ?</label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio ">
                                                <input type="radio" id="isLunas1" name="isLunas"
                                                    class="custom-control-input" value="Sudah">
                                                <label class="custom-control-label" for="isLunas1">Sudah</label>
                                            </div>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="isLunas2" name="isLunas"
                                                    class="custom-control-input" value="Belum">
                                                <label class="custom-control-label" for="isLunas2">Belum</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="isLunas" class="invalid-feedback"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Apakah sebelumnya pernah terlibat program ekonomi/sosial
                                ?</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="terlibatProgram1" name="terlibatProgram"
                                                class="custom-control-input" value="Pernah">
                                            <label class="custom-control-label" for="terlibatProgram1">Pernah</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="terlibatProgram2" name="terlibatProgram"
                                                class="custom-control-input" value="Belum">
                                            <label class="custom-control-label" for="terlibatProgram2">Belum</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="terlibatProgram" class="invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Apakah pernah menjadi pengurus dalam sebuah
                                kelompok/program?</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="pernahPengurus1" name="pernahPengurus"
                                                class="custom-control-input" value="Pernah">
                                            <label class="custom-control-label" for="pernahPengurus1">Pernah</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="pernahPengurus2" name="pernahPengurus"
                                                class="custom-control-input" value="Belum">
                                            <label class="custom-control-label" for="pernahPengurus2">Belum</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="pernahPengurus" class="invalid-feedback"></label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Indikator Keimanan</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Kebiasaan Patologis (judi, miras, pelacur,
                                narkoba)</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="kebiasaanPatologis1" name="kebiasaanPatologis"
                                                class="custom-control-input" value="Ya">
                                            <label class="custom-control-label" for="kebiasaanPatologis1">Ya</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="kebiasaanPatologis2" name="kebiasaanPatologis"
                                                class="custom-control-input" value="Tidak">
                                            <label class="custom-control-label" for="kebiasaanPatologis2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="kebiasaanPatologis" class="invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Sholat Fardhu</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="sholatFardu1" name="sholatFardu"
                                                class="custom-control-input" value="Rutin">
                                            <label class="custom-control-label" for="sholatFardu1">Rutin</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="sholatFardu2" name="sholatFardu"
                                                class="custom-control-input" value="Jarang">
                                            <label class="custom-control-label" for="sholatFardu2">Jarang</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="sholatFardu3" name="sholatFardu"
                                                class="custom-control-input" value="Tidak Pernah">
                                            <label class="custom-control-label" for="sholatFardu3">Tidak Pernah</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="sholatFardu" class="invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Kegiatan Pengajian</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="kegiatanPengajian1" name="kegiatanPengajian"
                                                class="custom-control-input" value="Rutin">
                                            <label class="custom-control-label" for="kegiatanPengajian1">Rutin</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="kegiatanPengajian2" name="kegiatanPengajian"
                                                class="custom-control-input" value="Jarang">
                                            <label class="custom-control-label" for="kegiatanPengajian2">Jarang</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="kegiatanPengajian3" name="kegiatanPengajian"
                                                class="custom-control-input" value="Tidak Pernah">
                                            <label class="custom-control-label" for="kegiatanPengajian3">Tidak
                                                Pernah</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="kegiatanPengajian" class="invalid-feedback"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Kebiasaan berinfaq</label>
                            <div class="col-sm-6">
                                <div class="d-flex flex-row bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio ">
                                            <input type="radio" id="kegiatanBerinfaq1" name="kegiatanBerinfaq"
                                                class="custom-control-input" value="Rutin">
                                            <label class="custom-control-label" for="kegiatanBerinfaq1">Rutin</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="kegiatanBerinfaq2" name="kegiatanBerinfaq"
                                                class="custom-control-input" value="Jarang">
                                            <label class="custom-control-label" for="kegiatanBerinfaq2">Jarang</label>
                                        </div>
                                    </div>
                                    <div class="p-2 bd-highlight">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="kegiatanBerinfaq3" name="kegiatanBerinfaq"
                                                class="custom-control-input" value="Tidak Pernah">
                                            <label class="custom-control-label" for="kegiatanBerinfaq3">Tidak Pernah</label>
                                        </div>
                                    </div>
                                </div>
                                <label for="kegiatanBerinfaq" class="invalid-feedback"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="keterangan3" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" class="form-control" id="keterangan3" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-muted bg-blue">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary px-5 py-2">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ url('js/pendaftar.js') }}"></script>
@endsection
