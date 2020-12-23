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
                            <div class="col-sm-3 mb-1">
                                <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi1">
                                    <option value="">Select</option>
                                    @foreach ($provinsi as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="kabupaten form-control fontSelect" style="width: 100%;" name="kabupaten1">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="kecamatan form-control fontSelect" style="width: 100%;" name="kecamatan1">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
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
                            <div class="col-sm-3 mb-1">
                                <select class="provinsi form-control fontSelect" style="width: 100%;" name="provinsi2">
                                    <option value="">Select</option>
                                    @foreach ($provinsi as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="kabupaten form-control fontSelect" style="width: 100%;" name="kabupaten2">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
                                <select class="kecamatan form-control fontSelect" style="width: 100%;" name="kecamatan2">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-1">
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
                            <input type="text" name="program" class="form-control" id="inputprogram3" placeholder="Program">
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
                            <input type="text" name="km" class="form-control" id="inputkm3" placeholder="KM">
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
                                    <input type="radio" id="kepemilikanRumah1" name="kepemilikanRumah"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah1">Menumpang</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah2" name="kepemilikanRumah"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah2">Kontrak</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah3" name="kepemilikanRumah"
                                        class="custom-control-input">
                                    <label class="custom-control-label" for="kepemilikanRumah3">Keluarga</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kepemilikanRumah4" name="kepemilikanRumah"
                                        class="custom-control-input">
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
                                    <label class="custom-control-label" for="kebun2">
                                        < 1000 m<sup>2</sup>
                                    </label>
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
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
                                            </div>
                                            <input type="number" class="form-control">
                                        </div>
                                    </label>
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

            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Aset Produktif</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="jenisAset">Sebutkan jenisnya : </label>
                        <textarea class="form-control" id="jenisAset" rows="3"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Penggunaan aset produktif
                            </legend>
                            <div class="col-sm-9">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gunaAset1" name="gunaAset" class="custom-control-input">
                                    <label class="custom-control-label" for="gunaAset1">Bertambahnya aset produktif</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gunaAset2" name="gunaAset" class="custom-control-input">
                                    <label class="custom-control-label" for="gunaAset2">Investasi usaha lain</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="gunaAset3" name="gunaAset" class="custom-control-input">
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
                    <button class="btn btn-primary btn-sm" id="addDataKeluarga" data-trigger="hover" data-toggle="popover"
                        data-content="Tambah Form Keluarga" data-placement="top">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="dataKeluarga"></div>
                        <div class="col-lg-6 dataKeluarga" id="dataKeluarga-1">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Keluarga 1</h6>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="javascript:removeElement('dataKeluarga-1');">
                                        <i class="fas fa-xs fa-trash"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputkm3" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama[]" class="form-control"
                                                placeholder="Nama Keluarga">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputkm3" class="col-sm-3 col-form-label">Umur</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="umur[]" class="form-control" placeholder="Umur">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputkm3" class="col-sm-3 col-form-label">hubungan</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select class="hubungan form-control" name="hubungan[]">
                                                    <option value="">Select</option>
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
                                        <label for="inputkm3" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select class="status form-control" name="status[]">
                                                    <option value="">Select</option>
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
                                                    name="pekerjaanUtama[]">

                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" placeholder="Pekerjaan Sampingan"
                                                    name="pekerjaanSampingan[]">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputkm3" class="col-sm-3 col-form-label">Pendidikan</label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <select class="pendidikan form-control" name="pendidikan[]">
                                                    <option value="">Select</option>
                                                    <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
                                                    <option value="Belum Tamat SD / Sederajat">Belum Tamat SD / Sederajat
                                                    </option>
                                                    <option value="Tamat SD / Sederajat">Tamat SD / Sederajat</option>
                                                    <option value="SLTP / Sederajat">SLTP / Sederajat</option>
                                                    <option value="SLTA / Sederajat">SLTA / Sederajat</option>
                                                    <option value="Diploma I">Diploma I / II</option>
                                                    <option value="Akademi / Diploma III / S. Muda">Akademi / Diploma III /
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
                                            <textarea name="keterangan[]" class="form-control" rows="2"></textarea>
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
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pendapatan Keluarga</h6>
                                    <button class="btn btn-primary btn-sm" id="addPendapatanKeluarga" data-trigger="hover"
                                        data-toggle="popover" data-content="Tambah Data Pendapatan Keluarga" data-placement="top">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row penghasilan">
                                        <label class="col-sm-6 col-form-label">Penghasilan Usaha Pokok</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="penghasilanPokok" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row penghasilan">
                                        <label class="col-sm-6 col-form-label">Penghasilan Usaha Simpanan</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="penghasilanSimpanan" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row penghasilan">
                                        <label class="col-sm-6 col-form-label">Penghasilan Istri/Suami</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="penghasilanSuami" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row penghasilan">
                                        <label class="col-sm-6 col-form-label">Penghasilan Anak/Menantu</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="penghasilanAnak" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Rutin Keluarga</h6>
                                    <button class="btn btn-primary btn-sm" id="addPengeluaranKeluarga" data-trigger="hover"
                                        data-toggle="popover" data-content="Tambah Data Pengeluaran Rutin Keluarga" data-placement="top">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row pengeluaran">
                                        <label class="col-sm-6 col-form-label">Kebutuhan Dapur</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="kebutuhanDapur" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row pengeluaran">
                                        <label class="col-sm-6 col-form-label">Pendidikan</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="pengeluaranPendidikan" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row pengeluaran">
                                        <label class="col-sm-6 col-form-label">Kesehatan</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="pengeluaranKesehatan" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row pengeluaran">
                                        <label class="col-sm-6 col-form-label">Transportasi</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="pengeluaranTransportasi" placeholder="Rp/*hari/bulan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row pengeluaran">
                                        <label class="col-sm-6 col-form-label">Iuran Rutin (Listrik, Siskamling, PAM)</label>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" class="form-control" name="pengeluaranIuranRutin" placeholder="Rp/*hari/bulan">
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

    </div>
@endsection

@section('js')
    <script>
        $('.hubungan').select2({
            placeholder: "Hubungan Dalam Keluarga",
            allowClear: true
        });
        $('.status').select2({
            placeholder: "Status Perkawinan",
            allowClear: true
        });
        $('.pendidikan').select2({
            placeholder: "Pendidikan Terakhir",
            allowClear: true
        });
        $('input[name="unggas"]').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
            verticalupclass: 'glyphicon glyphicon-plus',
            verticaldownclass: 'glyphicon glyphicon-minus'
        });
        $('input[name="kambing"]').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
            verticalupclass: 'glyphicon glyphicon-plus',
            verticaldownclass: 'glyphicon glyphicon-minus'
        });
        $('input[name="sapi"]').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
            verticalupclass: 'glyphicon glyphicon-plus',
            verticaldownclass: 'glyphicon glyphicon-minus'
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
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + k.options[k.selectedIndex].text +
                    '</li>');
            }
            if (ke.length >= 1) {
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + ke.options[ke.selectedIndex].text +
                    '</li>');
            }
            if (d.length >= 1) {
                $('#breadcrumbSekarang').append('<li class="breadcrumb-item">' + d.options[d.selectedIndex].text +
                    '</li>');
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
                $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + ke.options[ke.selectedIndex].text +
                    '</li>');
            }
            if (d.length >= 1) {
                $('#breadcrumbAsal').append('<li class="breadcrumb-item">' + d.options[d.selectedIndex].text + '</li>');
            }
        }
        var fileId = 1;

        function removeElement(elementId) {
            // Removes an element from the document
            var element = document.getElementById(elementId);
            element.parentNode.removeChild(element);
        }
        $(document).ready(function() {
            $("button#addDataKeluarga").on("click", function() {
                fileId++;
                let formKeluarga = `<div class="col-lg-6 dataKeluarga" id="dataKeluarga-` + fileId + `">
                                        <div class="card mb-4">
                                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <h6 class="m-0 font-weight-bold text-primary">Data Keluarga ` + fileId +
                    `</h6>
                                                <button class="btn btn-danger btn-sm" onclick="javascript:removeElement('dataKeluarga-` +
                    fileId + `'); return false;">
                                                    <i class="fas fa-xs fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="inputkm3" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama[]" class="form-control"
                                                            placeholder="Nama Keluarga">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputkm3" class="col-sm-3 col-form-label">Umur</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="umur[]" class="form-control" placeholder="Umur">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputkm3" class="col-sm-3 col-form-label">Hubungan</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="hubungan-` + fileId + ` form-control" name="hubungan[]">
                                                                <option value="">Select</option>
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
                                                    <label for="inputkm3" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="status-` + fileId + ` form-control" name="status[]">
                                                                <option value="">Select</option>
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
                                                                name="pekerjaanUtama[]">
            
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Pekerjaan Sampingan"
                                                                name="pekerjaanSampingan[]">
            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputkm3" class="col-sm-3 col-form-label">Pendidikan</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <select class="pendidikan-` + fileId + ` form-control" name="pendidikan[]">
                                                                <option value="">Select</option>
                                                                <option value="Tidak / Belum Sekolah">Tidak / Belum Sekolah</option>
                                                                <option value="Belum Tamat SD / Sederajat">Belum Tamat SD / Sederajat
                                                                </option>
                                                                <option value="Tamat SD / Sederajat">Tamat SD / Sederajat</option>
                                                                <option value="SLTP / Sederajat">SLTP / Sederajat</option>
                                                                <option value="SLTA / Sederajat">SLTA / Sederajat</option>
                                                                <option value="Diploma I">Diploma I / II</option>
                                                                <option value="Akademi / Diploma III / S. Muda">Akademi / Diploma III / S. Muda</option>
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
                                                        <textarea name="keterangan[]" class="form-control" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                $(".dataKeluarga:last").after(formKeluarga);
                $('.hubungan-' + fileId).select2({
                    placeholder: "Hubungan Dalam Keluarga",
                    allowClear: true
                });
                $('.status-' + fileId).select2({
                    placeholder: "Status Perkawinan",
                    allowClear: true
                });
                $('.pendidikan-' + fileId).select2({
                    placeholder: "Pendidikan Terakhir",
                    allowClear: true
                });
            })
        });
        $(document).ready(function() {
            $("button#addPendapatanKeluarga").on("click", function() {
                fileId++;
                let formPenghaslan = `<div class="form-group row penghasilan" id="penghasilan-` + fileId + `">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" name="namaPenghasilan[]" placeholder="Nama Penghasilan Lain">
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" name="penghasillanBaru[]" placeholder="Rp/*hari/bulan">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger btn-sm" onclick="javascript:removeElement('penghasilan-` + fileId + `'); return false;">
                                <i class="fas fa-xs fa-trash"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(".penghasilan:last").after(formPenghaslan);

            });
        });
        $(document).ready(function() {
            $("button#addPengeluaranKeluarga").on("click", function() {
                fileId++;
                let formPengeluaran = `<div class="form-group row pengeluaran" id="pengeluaran-` + fileId + `">
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-sm" name="namaPenghasilan[]" placeholder="Nama Pengeluaran Lain">
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" name="pengeluaranLain[]" placeholder="Rp/*hari/bulan">
                            <div class="input-group-prepend">
                                <button class="btn btn-danger btn-sm" onclick="javascript:removeElement('pengeluaran-` + fileId + `'); return false;">
                                <i class="fas fa-xs fa-trash"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>`;
                $(".pengeluaran:last").after(formPengeluaran);

            });
        });
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
@endsection
