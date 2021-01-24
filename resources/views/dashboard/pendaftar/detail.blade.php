@php
use Illuminate\Support\Facades\Auth;
$totalPendapatan = 0;
$totalPengeluaran = 0;
@endphp
@extends('layouts.main')
@section('title', 'SKM - ' . $data->nama . '')
@section('breadcrumb', 'Home,List Survey;survey, SKM - ' . $data->nama . '')

@section('isi')
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            Data perlu di survey untuk Studi Kelayakan Mitra / SKM
                        </div>
                        <div class="col-md-6 text-right">
                            Ditambahkan pada :
                            {{ \Carbon\Carbon::parse($data->tgl_input)->isoFormat('DD MMMM Y hh:mm') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card mb-4">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-4 font-weight-bold text-navy">Nama</label>
                        <label class="col-md-8">{{ $data->nama }}</label>
                        <label class="col-md-4 font-weight-bold text-navy">KM</label>
                        <label class="col-md-8">{{ $data->km }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card mb-4">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-4 font-weight-bold text-navy">Program</label>
                        <label class="col-md-8">{{ $data->program }}</label>
                        <label class="col-md-4 font-weight-bold text-navy">Data Ke </label>
                        <label class="col-md-8">{{ $data->data_ke }}</label>
                        <label class="col-md-4 font-weight-bold text-navy">Tanggal Input </label>
                        <label class="col-md-8">{{ $data->tgl_input }}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Alamat Lengkap</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-4 alamatSekarang font-weight-bold text-navy">Alamat
                                    Sekarang</label>
                                <label class="col-md-8">{{ $data->alamat_sekarang }}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-4 alamatAsal font-weight-bold text-navy">Alamat Asal</label>
                                <label class="col-md-8">{{ $data->alamat_asal }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Indeks Rumah Asal</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-6 font-weight-bold text-navy">Ukuran Rumah ( m <sup>2</sup> /orang
                            )</label>
                        <label class="col-md-6">{!! $detail->idx_ukuran_rumah !!}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Dinding</label>
                        <label class="col-md-6">{{ $detail->idx_dinding }}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Lantai</label>
                        <label class="col-md-6">{{ $detail->idx_lantai }}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Atap</label>
                        <label class="col-md-6">{{ $detail->idx_atap }}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Kepemilikan Rumah</label>
                        <label class="col-md-6">{{ $detail->idx_kpm_rumah }}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Dapur</label>
                        <label class="col-md-6">{{ $detail->idx_dapur }}</label>
                        <label class="col-md-6 font-weight-bold text-navy">Kursi</label>
                        <label class="col-md-6">{{ $detail->idx_kursi }}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kepemilikan Aset Pribadi</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-5 font-weight-bold text-navy">Kebun / Sawah</label>
                        <label class="col-md-7">{!! $detail->aset_pribadi_sawah !!}</label>
                        <label class="col-md-5 font-weight-bold text-navy">Elektronik</label>
                        <label class="col-md-7">{{ $detail->aset_pribadi_elektronik }}</label>
                        <label class="col-md-5 font-weight-bold text-navy">Kendaraan</label>
                        <label class="col-md-7">{{ $detail->aset_pribadi_kendaraan }}</label>
                        <label class="col-md-5 font-weight-bold text-navy">Ternak</label>
                        <label class="col-md-7 row">
                            @php
                                $hewan = explode(',', $detail->aset_pribadi_ternak);
                                foreach ($hewan as $i => $key) {
                                    $h = explode(':', $key);
                                    if (count($h) > 1) {
                                        echo '<label class="col-7">' . $h[0] . ' </label>';
                                        echo '<label class="col-5">(' . $h[1] . ' <sub>ekor</sub>)</label>';
                                    }
                                }
                            @endphp
                        </label>
                        <label class="col-md-5 font-weight-bold text-navy">Simpanan</label>
                        <label class="col-md-7">{{ $detail->aset_pribadi_simpanan }}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Aset Produktif</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-4 font-weight-bold text-navy">Jenisnya </label>
                        <label class="col-md-8">{{ $detail->aset_produktif_jenis }}</label>
                        <label class="col-md-4 font-weight-bold text-navy">Penggunaan Aset</label>
                        <label class="col-md-8">{{ $detail->aset_produktif_penggunaan }}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Keluarga</h6>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-xs table-hover">
                        <thead class="thead-light text-center">
                            <th class="align-middle" rowspan="2">No</th>
                            <th class="align-middle" rowspan="2">Nama</th>
                            <th class="align-middle" rowspan="2">Umur</th>
                            <th class="align-middle" rowspan="2">Hubungan<br>Dalam<br>Keluarga</th>
                            <th class="align-middle" rowspan="2">Status</th>
                            <th class="align-middle" colspan="2">Pekerjaan</th>
                            <th class="align-middle" rowspan="2">Pendidikan</th>
                            <th class="align-middle" rowspan="2">Ket</th>
                            </tr>
                            <tr>
                                <th class="align-middle">Utama</th>
                                <th class="align-middle">Sampingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keluarga as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-primary">{{ $value->nama }}</td>
                                    <td>{{ $value->umur }}</td>
                                    <td>{{ $value->hubungan }}</td>
                                    <td>{{ $value->status_perkawinan }}</td>
                                    <td>{{ $value->pekerjaan_utama }}</td>
                                    <td>{{ $value->pekerjaan_sampingan }}</td>
                                    <td>{{ $value->pendidikan }}</td>
                                    <td>{{ $value->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keuangan Keluarga</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card md-2">
                                <div
                                    class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">A. Data Pendapatan Keluarga</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush text-xs table-hover">
                                        <thead class="thead-light text-center">
                                            <th class="align-middle">No</th>
                                            <th class="align-middle">Pendapatan Keluarga</th>
                                            <th class="align-middle" colspan="2">Jumlah<br>Rp / * hari/bulan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendapatan as $key => $value)
                                                @php $totalPendapatan += $value->jumlah; @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->nama_pendapatan }}</td>
                                                    <td>Rp</td>
                                                    <td>{{ $value->jumlah }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="text-info">
                                            <tr>
                                                <th colspan="2">Total Pendapatan</th>
                                                <th>Rp</th>
                                                <th>{{ $totalPendapatan }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-2">
                                <div
                                    class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">B. Data Pengeluaran Keluarga</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush text-xs table-hover">
                                        <thead class="thead-light text-center">
                                            <th class="align-middle">No</th>
                                            <th class="align-middle">Pendapatan Keluarga</th>
                                            <th class="align-middle" colspan="2">Jumlah<br>Rp / * hari/bulan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pengeluaran as $key => $value)
                                                @php $totalPengeluaran += $value->jumlah; @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $value->nama_pengeluaran }}</td>
                                                    <td>Rp</td>
                                                    <td>{{ $value->jumlah }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="text-info">
                                            <tr>
                                                <th colspan="2">Total Pengeluaran</th>
                                                <th>Rp</th>
                                                <th>{{ $totalPengeluaran }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>

                        @php
                            $total = $totalPendapatan - $totalPengeluaran;
                            $alert = $total > 0 ? 'alert-success' : 'alert-warning';
                        @endphp
                        <div class="col-md-12">
                            <div class="alert {{ $alert }}">
                                <div class="row">
                                    <label class="col-md-8">
                                        Sisa pendapatan per bulan ( A - B ) :
                                    </label>
                                    <label class="col-md-4 font-weight-bold text-md-right">Rp.
                                        {{ $total }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card mt-4 mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keterlibatan Dalam Program</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-hover">
                                <tr>
                                    <td class="text-navy">Apakah pernah melakukan peminjaman dana sebelumnya ?</td>
                                    <td>{{ $program->isPinjam }}</td>
                                </tr>
                                @if ($program->isPinjam == 'Ya')
                                    <tr>
                                        <td class="text-navy">Jika Ya, lembaga apa yang memberi pinjaman ?</td>
                                        <td>{{ $program->nama_lembaga }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-navy">Berapa besar anda meminjam pada lembaga tersebut ?</td>
                                        <td>{{ $program->besar_pinjaman }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-navy">Bagaimana cara anda mengembalikan dana yang dipinjam ?
                                        </td>
                                        <td>{{ $program->cara_pengembalian }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-navy">Berapa lama masa pinjaman anda ?</td>
                                        <td>{{ $program->lama_pinjaman }} {{ $program->pinjaman_per }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-navy">Berapa total dana yang harus anda kembalikan pada masa itu
                                            ?
                                        </td>
                                        <td>{{ $program->total_pinjam }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-navy">Apakah pinjaman tersebut saat ini sudah Lunas ?</td>
                                        <td>{{ $program->isLunas }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td class="text-navy">Apakah sebelumnya pernah terlibat program ekonomi/sosial ?
                                    </td>
                                    <td>{{ $program->terlibat_program }}</td>
                                </tr>
                                <tr>
                                    <td class="text-navy">Apakah pernah menjadi pengurus dalam sebuah kelompok/program?
                                    </td>
                                    <td>{{ $program->pernah_pengurus }}</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card mt-4 mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Indikator Keimanan</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-hover">
                                <tr>
                                    <td class="text-navy">Kebiasaan Patologis (judi, miras, pelacur, narkoba)</td>
                                    <td>{{ $indikator->kebiasaan_patologis }}</td>
                                </tr>
                                <tr>
                                    <td class="text-navy">Sholat Fardhu</td>
                                    <td>{{ $indikator->sholat_fardu }}</td>
                                </tr>
                                <tr>
                                    <td class="text-navy">Kegiatan Pengajian</td>
                                    <td>{{ $indikator->kegiatan_pengajian }}</td>
                                </tr>
                                <tr>
                                    <td class="text-navy">Kebiasaan Berinfaq</td>
                                    <td>{{ $indikator->kegiatan_berinfaq }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card card mt-4 mb-4">
                <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Keterangan Lain</h6>
                </div>
                <div class="card-body">
                    <p class="text-navy">
                        {{ $data->keterangan }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form id="detail" method="POST" action="{{ url('pendaftar/approved', ['id' => $data->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card card mt-4 mb-4">
                    <div class="card-header py-3 d-flex justify-content-center align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Kelayakan</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush table-hover">
                            <thead class="thead-light text-center">
                                <th class="align-middle">No</th>
                                <th class="align-middle">Parameter</th>
                                <th class="align-middle">Kelayakan</th>
                                <th class="align-middle">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">1</td>
                                    <td class="align-middle">Indeks Rumah</td>
                                    <td class="align-middle text-center">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-center bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio ">
                                                        <input type="radio" id="indeksRumah1" name="indeksRumah"
                                                            class="custom-control-input" value="1">
                                                        <label class="custom-control-label" for="indeksRumah1">Layak</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indeksRumah2" name="indeksRumah"
                                                            class="custom-control-input" value="0">
                                                        <label class="custom-control-label" for="indeksRumah2">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="indeksRumah" class="invalid-feedback"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <input type="text" class="form-control form-control" style="margin-top:-5px;"
                                            name="ketIndeksRumah">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle">2</td>
                                    <td class="align-middle">Kepemilikan Harta</td>
                                    <td class="align-middle text-center">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-center bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio ">
                                                        <input type="radio" id="indeksHarta1" name="indeksHarta"
                                                            class="custom-control-input" value="1">
                                                        <label class="custom-control-label" for="indeksHarta1">Layak</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indeksHarta2" name="indeksHarta"
                                                            class="custom-control-input" value="0">
                                                        <label class="custom-control-label" for="indeksHarta2">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="indeksHarta" class="invalid-feedback"></label>
                                        </div>
                                    </td>
                                    <td class="align-middle"><input type="text" class="form-control form-control"
                                            style="margin-top:-5px;" name="ketIndeksharta"></td>
                                </tr>
                                <tr>
                                    <td class="align-middle">3</td>
                                    <td class="align-middle">Pendapatan</td>
                                    <td class="align-middle text-center">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-center bd-highlight">
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio ">
                                                        <input type="radio" id="indeksPendapatan1" name="indeksPendapatan"
                                                            class="custom-control-input" value="1">
                                                        <label class="custom-control-label"
                                                            for="indeksPendapatan1">Layak</label>
                                                    </div>
                                                </div>
                                                <div class="p-2 bd-highlight">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="indeksPendapatan2" name="indeksPendapatan"
                                                            class="custom-control-input" value="0">
                                                        <label class="custom-control-label"
                                                            for="indeksPendapatan2">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="indeksPendapatan" class="invalid-feedback"></label>
                                        </div>
                                    </td>
                                    <td><input type="text" class="form-control form-control" style="margin-top:-5px;"
                                            name="ketIndeksPendapatan"></td>
                                </tr>
                            </tbody>
                            <tfoot class="text-navy text-center">
                                <tr>
                                    <th colspan="2">Rekomendasi</th>
                                    <th colspan="2">
                                        Data ini akan dinilai oleh {{Auth::user()->name}} pada tanggal {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}
                                    </th>
                                </tr>
                            </tfoot>
                            
                        </table>
                    </div>
                    <div class="card-footer text-muted bg-blue">
                        <div class="float-right">
                            <button type="submit" class="btn btn-danger px-5 py-2" value="0"
                                name="rekomendasi">Rejected</button>
                            <button class="btn btn-success px-5 py-2" value="1" name="rekomendasi">Approved</button>
                        </div>
                    </div>
                </div>
            </form>
        </div </div>


    @endsection
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            $(function() {
                var output = document.getElementById('output');
                getAlamatLengkap(`{{ $data->id_desa_sekarang }}`, '.alamatSekarang');
                getAlamatLengkap(`{{ $data->id_desa_asal }}`, '.alamatAsal');

                function getAlamatLengkap(id, element) {
                    axios.get(`{{ url('desaId/` + id + `') }}`)
                        .then(function(res) {
                            let html = `
                                                                            <label class="col-md-4 font-weight-bold text-navy">Provinsi</label>
                                                                            <label class="col-md-8">` + res.data.provinsi + `</label>
                                                                            <label class="col-md-4 font-weight-bold text-navy">Kabupaten</label>
                                                                            <label class="col-md-8">` + res.data
                                .kabupaten + `</label>
                                                                            <label class="col-md-4 font-weight-bold text-navy">Kecamatan</label>
                                                                            <label class="col-md-8">` + res.data
                                .kecamatan + `</label>
                                                                            <label class="col-md-4 font-weight-bold text-navy">Desa</label>
                                                                            <label class="col-md-8">` + res.data.desa + `</label>
                                                                            `
                            $(element).before(html);
                        })
                        .catch(function(error) {
                            console.log("Data desa tidak ditemukan");
                        })
                }
            });

            // Validation Form
            $('#detail').validate({
                onkeyup: function(element) {
                    $(element).valid()
                },
                onclick: function(element) {
                    $(element).valid()
                },
                rules: {
                    rekomendasi: {
                        required: true
                    },
                    indeksPendapatan: {
                        required: true
                    },
                    indeksHarta: {
                        required: true
                    },
                    indeksRumah: {
                        required: true
                    },

                },
                messages: {},
                errorClass: "invalid-feedback",
                // errorElement: 'div',
                // validClass: "valid-tooltip",
                highlight: function(element, errorClass, validClass) {
                    if ($(element).attr("type") == "radio") {
                        $('input[name=' + $(element).attr("name") + ']').removeClass("is-valid").addClass(
                            "is-invalid");
                    } else {
                        $(element).removeClass('is-valid').addClass('is-invalid');
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    if ($(element).attr("type") == "radio") {
                        $('input[name=' + $(element).attr("name") + ']').removeClass('is-invalid').addClass(
                            'is-valid');
                    } else {
                        $(element).removeClass('is-invalid').addClass('is-valid');
                    }
                },
            });

        </script>

    @endsection
