<?php

namespace App\Http\Controllers;

use App\IndikatorKeimanan;
use App\Pendaftar;
use App\PendaftarDetail;
use App\PendaftarKeluarga;
use App\PendapatanKeluarga;
use App\PengeluaranKeluarga;
use App\ProgramLain;
use App\RekapitulasiKelayakan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pendaftar.pendaftar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::transaction(function () use ($request) {
        // });
        DB::beginTransaction();
        try {
            $userId = Auth::user()->id;
            $result = $this->tambahDataPendaftar($userId, $request);
            DB::commit();
            // return response()->json($request->all());
            return redirect('/pendaftar')->with('sukses', 'Data berhasil di tambahkan');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/pendaftar')->with('error', $e->errorInfo[2]);
        }
    }

    public function rekom(Request $request, $id)
    {
        // DB::transaction(function () use ($request) {
        // });
        DB::beginTransaction();
        try {
            $userId = Auth::user();
            $pendaftar = Pendaftar::find($id);
            $pendaftar->rekomendasi = $request->rekomendasi;
            $pendaftar->tgl_cek = now();
            $pendaftar->surveyor = $userId->name;
            $pendaftar->surveyor_id = $userId->id;
            $pendaftar->updated_by = $userId->id;
            $pendaftar->save();

            $list = array();
            $listrkp = array("Indeks Rumah", "Kepemilikan Harta", "Pendapatan");
            $listValue = array($request->indeksRumah, $request->indeksHarta, $request->indeksPendapatan);
            $listKet = array($request->ketIndeksRumah, $request->ketIndeksharta, $request->ketIndeksPendapatan);
            foreach ($listrkp as $key => $value) {
                $rkp = new RekapitulasiKelayakan();
                $rkp->pendaftar_id = $pendaftar->id;
                $rkp->parameter = $value;
                $rkp->kelayakan = $listValue[$key];
                $rkp->keterangans = $listKet[$key];
                $rkp->created_by = $userId->id;
                $rkp->updated_by = $userId->id;
                $rkp->save();
                $list[] = $rkp;
            }

            DB::commit();
            // return response()->json($list);
            $rekom = $request->rekomendasi == "1" ? "Approved" : "Rejected";
            $pesan = "Data berhasil di ".$rekom;
            return redirect('/pendaftar/'.$id)->with('sukses', $pesan );
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/pendaftar/'.$id)->with('error', $e->errorInfo[2]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftar $pendaftar)
    {
        $data = Pendaftar::findOrFail($pendaftar->id);
        $detail = PendaftarDetail::where('pendaftar_id','=',$data->id)->firstOrFail();
        $keluarga = PendaftarKeluarga::where('pendaftar_id','=',$data->id)->orderBy('id', 'asc')->get();
        $pendapatan = PendapatanKeluarga::where('pendaftar_id','=',$data->id)->orderBy('id', 'asc')->get();
        $pengeluaran = PengeluaranKeluarga::where('pendaftar_id','=',$data->id)->orderBy('id', 'asc')->get();
        $program = ProgramLain::where('pendaftar_id','=',$data->id)->first();
        $indikator = IndikatorKeimanan::where('pendaftar_id','=',$data->id)->first();
        $rkp = RekapitulasiKelayakan::where('pendaftar_id','=',$data->id)->orderBy('id', 'asc')->get();
        return view('dashboard.pendaftar.detail')->with(compact('data'))
        ->with(compact('detail'))
        ->with(compact('keluarga'))
        ->with(compact('pendapatan'))
        ->with(compact('pengeluaran'))
        ->with(compact('program'))
        ->with(compact('indikator'))
        ->with(compact('rkp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftar  $pendaftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftar $pendaftar)
    {
        //
    }

    public function survey()
    {
        $survey = Pendaftar::select('pendaftar.*', 
        DB::raw("(SELECT sum(pendapatan_keluarga.jumlah) FROM pendapatan_keluarga WHERE pendapatan_keluarga.pendaftar_id = pendaftar.id) as total_pendapatan"),
        DB::raw("(SELECT sum(pengeluaran_keluarga.jumlah) FROM pengeluaran_keluarga WHERE pengeluaran_keluarga.pendaftar_id = pendaftar.id) as total_pengeluaran"),
        DB::raw("(SELECT COUNT(pendaftar_keluarga.id) FROM pendaftar_keluarga WHERE pendaftar_keluarga.pendaftar_id = pendaftar.id) as total_keluarga")
        )->where("rekomendasi",null)
        ->orderBy('created_at', 'desc')->get();
        return view('dashboard.pendaftar.survey', compact('survey'));
    }
    public function approved()
    {
        $approved = Pendaftar::select('pendaftar.*', 
        DB::raw("(SELECT sum(pendapatan_keluarga.jumlah) FROM pendapatan_keluarga WHERE pendapatan_keluarga.pendaftar_id = pendaftar.id) as total_pendapatan"),
        DB::raw("(SELECT sum(pengeluaran_keluarga.jumlah) FROM pengeluaran_keluarga WHERE pengeluaran_keluarga.pendaftar_id = pendaftar.id) as total_pengeluaran"),
        DB::raw("(SELECT COUNT(pendaftar_keluarga.id) FROM pendaftar_keluarga WHERE pendaftar_keluarga.pendaftar_id = pendaftar.id) as total_keluarga")
        )->where("rekomendasi",1)
        ->orderBy('created_at', 'desc')->get();
        return view('dashboard.pendaftar.approved', compact('approved'));
    }
    public function rejected()
    {
        $rejected = Pendaftar::select('pendaftar.*', 
        DB::raw("(SELECT sum(pendapatan_keluarga.jumlah) FROM pendapatan_keluarga WHERE pendapatan_keluarga.pendaftar_id = pendaftar.id) as total_pendapatan"),
        DB::raw("(SELECT sum(pengeluaran_keluarga.jumlah) FROM pengeluaran_keluarga WHERE pengeluaran_keluarga.pendaftar_id = pendaftar.id) as total_pengeluaran"),
        DB::raw("(SELECT COUNT(pendaftar_keluarga.id) FROM pendaftar_keluarga WHERE pendaftar_keluarga.pendaftar_id = pendaftar.id) as total_keluarga")
        )->where("rekomendasi",0)
        ->orderBy('created_at', 'desc')->get();
        return view('dashboard.pendaftar.rejected', compact('rejected'));
    }
    public static function totalPendaftar($status)
    {
        if($status =="survey"){
            $total = Pendaftar::where("rekomendasi",null)
            ->count();
        }else if($status == "approved"){
            $total = Pendaftar::where("rekomendasi",1)
            ->count();
        }else if ($status == "rejected"){
            $total = Pendaftar::where("rekomendasi",0)
            ->count();
        }else{
            $total = Pendaftar::get()->count();
        }
        return $total;

    }
    public function pendaftarManagement()
    {
        $survey = Pendaftar::select('pendaftar.*', 
        DB::raw("(SELECT sum(pendapatan_keluarga.jumlah) FROM pendapatan_keluarga WHERE pendapatan_keluarga.pendaftar_id = pendaftar.id) as total_pendapatan"),
        DB::raw("(SELECT sum(pengeluaran_keluarga.jumlah) FROM pengeluaran_keluarga WHERE pengeluaran_keluarga.pendaftar_id = pendaftar.id) as total_pengeluaran"),
        DB::raw("(SELECT COUNT(pendaftar_keluarga.id) FROM pendaftar_keluarga WHERE pendaftar_keluarga.pendaftar_id = pendaftar.id) as total_keluarga")
        )
        ->orderBy('created_at', 'desc')->get();
        return view('dashboard.pendaftar.pendaftarManagement', compact('survey'));
    }

    public function tambahDataPendaftar($userId, Request $request)
    {
        $pendaftar = new Pendaftar();
        $pendaftar->nama = $request->nama;
        $pendaftar->id_desa_sekarang = $request->desa1;
        $pendaftar->alamat_sekarang = $request->alamatsekarang;
        $pendaftar->id_desa_asal = $request->desa2;
        $pendaftar->alamat_asal = $request->alamatasal;
        $pendaftar->km = $request->km;
        $pendaftar->program = $request->program;
        $pendaftar->data_ke = Pendaftar::latest()->first()->data_ke + 1;
        $pendaftar->tgl_input = $request->tanggalinput;
        $pendaftar->keterangan = $request->keterangan;
        $pendaftar->created_by = $userId;
        $pendaftar->updated_by = $userId;
        $pendaftar->save();
        $idPendaftar = $pendaftar->id;

        // Pendaftar Detail
        $pendaftarDetail = new PendaftarDetail();
        $pendaftarDetail->pendaftar_id = $idPendaftar;
        $pendaftarDetail->idx_ukuran_rumah = $request->ukuranRumah;
        $pendaftarDetail->idx_dinding = $request->dinding;
        $pendaftarDetail->idx_lantai = $request->lantai;
        $pendaftarDetail->idx_atap = $request->atap;
        $pendaftarDetail->idx_kpm_rumah = $request->kepemilikanRumah;
        $pendaftarDetail->idx_dapur = $request->dapur;
        $pendaftarDetail->idx_kursi = $request->kursi;
        $pendaftarDetail->aset_pribadi_sawah = $request->kebun;
        $pendaftarDetail->aset_pribadi_elektronik = $request->elektronik;
        $pendaftarDetail->aset_pribadi_kendaraan = $request->kendaraan;
        $pendaftarDetail->aset_pribadi_ternak = "Unggas:" . $request->unggas . ",Kambing/Domba:" . $request->kambing . ",Sapi/Kerbau:" . $request->sapi . "";
        $pendaftarDetail->aset_pribadi_simpanan = $request->simpanan;
        $pendaftarDetail->aset_produktif_jenis = $request->jenisAset;
        $pendaftarDetail->aset_produktif_penggunaan = $request->gunaAset;
        $pendaftarDetail->created_by = $userId;
        $pendaftarDetail->updated_by = $userId;
        $pendaftarDetail->save();

        // Insert Data Keluarga;
        $lisKeluarga = array();
        foreach (($request->namaKeluarga) as $key => $value) {
            $pendaftarKeluarga = new PendaftarKeluarga();
            $pendaftarKeluarga->pendaftar_id = $idPendaftar;
            $pendaftarKeluarga->nama = $value;
            $pendaftarKeluarga->umur = $request->umur[$key];
            $pendaftarKeluarga->hubungan = $request->hubungan[$key];
            $pendaftarKeluarga->status_perkawinan = $request->status[$key];
            $pendaftarKeluarga->pekerjaan_utama = $request->pekerjaanUtama[$key];
            $pendaftarKeluarga->pekerjaan_sampingan = $request->pekerjaanSampingan[$key];
            $pendaftarKeluarga->pendidikan = $request->pendidikan[$key];
            $pendaftarKeluarga->keterangan = $request->keteranganKeluarga[$key];
            $pendaftarKeluarga->created_by = $userId;
            $pendaftarKeluarga->updated_by = $userId;
            $pendaftarKeluarga->save();
            $lisKeluarga[] = $pendaftarKeluarga;
        }



        // Pendapatan Keluarga 
        $listPendapatanKeluarga = array();
        $pendapatanPrimary = array("Penghasilan Usaha Pokok", "Penghasilan Usaha Sampingan", "Penghasilan Istri/Suami", "Penghasilan Anak/Menantu");
        $nilaiPendapatanPrimary = array($request->penghasilanPokok, $request->penghasilanSimpanan, $request->penghasilanSuami, $request->penghasilanAnak);
        $pendapatanMerge = $request->namaPenghasilan == NULL ? $pendapatanPrimary : array_merge($pendapatanPrimary, $request->namaPenghasilan);
        $nilaiPendapatanMerge = $request->penghasilanBaru == NULL ? $nilaiPendapatanPrimary : array_merge($nilaiPendapatanPrimary, $request->penghasilanBaru);
        foreach ($pendapatanMerge as $key => $value) {
            $pendapatanKeluarga = new PendapatanKeluarga();
            $pendapatanKeluarga->pendaftar_id = $idPendaftar;
            $pendapatanKeluarga->nama_pendapatan = $value;
            $pendapatanKeluarga->jumlah = $nilaiPendapatanMerge[$key];
            $pendapatanKeluarga->created_by = $userId;
            $pendapatanKeluarga->updated_by = $userId;
            $pendapatanKeluarga->save();
            $listPendapatanKeluarga[] = $pendapatanKeluarga;
        }

        // Pengeluaran Keluarga
        $listPengeluaranKeluarga = array();
        $pengeluaranPrimary = array("Kebutuhan Dapur", "Pendidikan", "Kesehatan", "Transportasi", "Iuran Rutin (Listrik, Siskamling, PAM)");
        $nilaiPengeluaranPrimary = array($request->kebutuhanDapur, $request->pengeluaranPendidikan, $request->pengeluaranKesehatan, $request->pengeluaranTransportasi, $request->pengeluaranIuranRutin);
        $pengeluaranMerge = $request->namaPengeluaran == NULL ? $pengeluaranPrimary : array_merge($pengeluaranPrimary, $request->namaPengeluaran);
        $nilaiPengeluaranMerge = $request->pengeluaranBaru == NULL ? $nilaiPengeluaranPrimary : array_merge($nilaiPengeluaranPrimary, $request->pengeluaranBaru);
        foreach ($pengeluaranMerge as $key => $value) {
            $pengeluaranKeluarga = new PengeluaranKeluarga();
            $pengeluaranKeluarga->pendaftar_id = $idPendaftar;
            $pengeluaranKeluarga->nama_pengeluaran = $value;
            $pengeluaranKeluarga->jumlah = $nilaiPengeluaranMerge[$key];
            $pengeluaranKeluarga->created_by = $userId;
            $pengeluaranKeluarga->updated_by = $userId;
            $pengeluaranKeluarga->save();
            $listPengeluaranKeluarga[] = $pengeluaranKeluarga;
        }


        // Program Lain
        $programLain = new ProgramLain();
        $programLain->pendaftar_id = $idPendaftar;
        $programLain->isPinjam = $request->isPinjam;
        $programLain->nama_lembaga = $request->namaLembaga;
        $programLain->besar_pinjaman = $request->besarPinjaman;
        $programLain->cara_pengembalian = $request->caraPengembalian;
        $programLain->lama_pinjaman = $request->lamaPinjam;
        $programLain->pinjaman_per = $request->pinjamPer;
        $programLain->total_pinjam = $request->totalPinjam;
        $programLain->isLunas = $request->isLunas;
        $programLain->terlibat_program = $request->terlibatProgram;
        $programLain->pernah_pengurus = $request->pernahPengurus;
        $programLain->created_by = $userId;
        $programLain->updated_by = $userId;
        $programLain->save();

        // Indikator Keimanan
        $indikatorkeimanan = new IndikatorKeimanan();
        $indikatorkeimanan->pendaftar_id = $idPendaftar;
        $indikatorkeimanan->kebiasaan_patologis = $request->kebiasaanPatologis;
        $indikatorkeimanan->sholat_fardu = $request->sholatFardu;
        $indikatorkeimanan->kegiatan_pengajian = $request->kegiatanPengajian;
        $indikatorkeimanan->kegiatan_berinfaq = $request->kegiatanBerinfaq;
        $indikatorkeimanan->created_by = $userId;
        $indikatorkeimanan->updated_by = $userId;
        $indikatorkeimanan->save();


        $data = new stdClass();
        $data->pendaftar = $pendaftar;
        $data->pendaftarDetail = $pendaftarDetail;
        $data->dataKeluarga = $lisKeluarga;
        $data->listPendapatanKeluarga = $listPendapatanKeluarga;
        $data->listPengeluaranKeluarga = $listPengeluaranKeluarga;
        $data->programLain = $programLain;
        $data->indikatorkeimanan = $indikatorkeimanan;
        // $data->property = $request->all();
        // return response()->json($data);
        return $data;
    }
}
