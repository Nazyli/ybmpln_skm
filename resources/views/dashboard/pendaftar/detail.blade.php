@php
$detail = \App\PendaftarDetail::where('pendaftar_id','=',$data->id)->first();
@endphp
@extends('layouts.main')
@section('title', 'SKM - ' . $data->nama . '')
@section('breadcrumb', 'Home,List Survey;survey, SKM - ' . $data->nama . '')

@section('isi')
    <div class="row">
        <div class="col-md-12">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            Data perlu di survey untuk Studi Kelayakan Mitra / SKM
                        </div>
                        <div class="col-md-6 text-right">
                            Ditambahkan pada : {{ \Carbon\Carbon::parse($data->tgl_input)->isoFormat('DD MMMM Y hh:mm') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card mb-4">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-4 font-weight-bold">Nama</label>
                        <label class="col-sm-8">{{ $data->nama }}</label>
                        <label class="col-sm-4 font-weight-bold">KM</label>
                        <label class="col-sm-8">{{ $data->km }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card mb-4">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-4 font-weight-bold">Program</label>
                        <label class="col-sm-8">{{ $data->program }}</label>
                        <label class="col-sm-4 font-weight-bold">Data Ke </label>
                        <label class="col-sm-8">{{ $data->data_ke }}</label>
                        <label class="col-sm-4 font-weight-bold">Tanggal Input </label>
                        <label class="col-sm-8">{{ $data->tgl_input }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Alamat Lengkap</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 alamatSekarang font-weight-bold">Alamat Sekarang</label>
                                <label class="col-sm-8">{{ $data->alamat_sekarang }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-sm-4 alamatAsal font-weight-bold">Alamat Asal</label>
                                <label class="col-sm-8">{{ $data->alamat_asal }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Indeks Rumah Asal</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-6 font-weight-bold">Ukuran Rumah ( m <sup>2</sup> /orang )</label>
                        <label class="col-sm-6">{!! $detail->idx_ukuran_rumah !!}</label>
                        <label class="col-sm-6 font-weight-bold">Dinding</label>
                        <label class="col-sm-6">{{ $detail->idx_dinding }}</label>
                        <label class="col-sm-6 font-weight-bold">Lantai</label>
                        <label class="col-sm-6">{{ $detail->idx_lantai }}</label>
                        <label class="col-sm-6 font-weight-bold">Atap</label>
                        <label class="col-sm-6">{{ $detail->idx_atap }}</label>
                        <label class="col-sm-6 font-weight-bold">Kepemilikan Rumah</label>
                        <label class="col-sm-6">{{ $detail->idx_kpm_rumah }}</label>
                        <label class="col-sm-6 font-weight-bold">Dapur</label>
                        <label class="col-sm-6">{{ $detail->idx_dapur }}</label>
                        <label class="col-sm-6 font-weight-bold">Kursi</label>
                        <label class="col-sm-6">{{ $detail->idx_kursi }}</label>
                    </div>
                </div>
            </div>
        </div>

        {{--  <div class="col-md-6">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kepemilikan Aset Pribadi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-6 font-weight-bold">Kebun / Sawah</label>
                        <label class="col-sm-6">{!! $detail->aset_pribadi_sawah !!}</label>
                        <label class="col-sm-6 font-weight-bold">Elektronik</label>
                        <label class="col-sm-6">{{ $detail->aset_pribadi_elektronik }}</label>
                        <label class="col-sm-6 font-weight-bold">Kendaraan</label>
                        <label class="col-sm-6">{{ $detail->aset_pribadi_kendaraan }}</label>
                        <label class="col-sm-6 font-weight-bold">Ternak</label>
                        <label class="col-sm-6 row">
                            @php
                            $hewan = explode(",",$detail->aset_pribadi_ternak);   
                            foreach($hewan as $i =>$key) {
                                $h = explode(":",$key);
                                if(count($h) > 1){
                                  echo '<label class="col-sm-9 font-weight-bold">'.$h[0].'</label>';
                                  echo '<label class="col-sm-3 font-weight-bold">'.$h[1].'</label>';
                                }
                            }
                            @endphp
                        </label>
                        <label class="col-sm-6 font-weight-bold">Simpanan</label>
                        <label class="col-sm-6">{{ $detail->aset_pribadi_simpanan }}</label>
                    </div>
                </div>
            </div>

            <div class="card card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Aset Produktif</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-6 font-weight-bold">Jenisnya </label>
                        <label class="col-sm-6">{{ $detail->aset_produktif_jenis }}</label>
                        <label class="col-sm-6 font-weight-bold">Penggunaan Aset</label>
                        <label class="col-sm-6">{{ $detail->aset_produktif_penggunaan }}</label>
                    </div>
                </div>
            </div>
        </div>  --}}

    </div>
@endsection
@section('js')
    {{--  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(function() {
            var output = document.getElementById('output');
            getAlamatLengkap(`{{ $data->id_desa_sekarang }}`, '.alamatSekarang');
            getAlamatLengkap(`{{ $data->id_desa_asal }}`, '.alamatAsal');

            function getAlamatLengkap(id, element) {
                axios.get(`{{ url('desaId/` + id + `') }}`)
                    .then(function(res) {
                        let html = `
                        <label class="col-sm-4 font-weight-bold">Provinsi</label>
                        <label class="col-sm-8">` + res.data.provinsi + `</label>
                        <label class="col-sm-4 font-weight-bold">Kabupaten</label>
                        <label class="col-sm-8">` + res.data.kabupaten + `</label>
                        <label class="col-sm-4 font-weight-bold">Kecamatan</label>
                        <label class="col-sm-8">` + res.data.kecamatan + `</label>
                        <label class="col-sm-4 font-weight-bold">Desa</label>
                        <label class="col-sm-8">` + res.data.desa + `</label>
                        `
                        $(element).before(html);
                    })
                    .catch(function(error) {
                        console.log("Data desa tidak ditemukan");
                    })
            }
        });

    </script>  --}}

@endsection
