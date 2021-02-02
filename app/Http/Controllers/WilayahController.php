<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kabupaten;
use App\Kecamatan;
use App\Provinsi;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinsi = Provinsi::all();
        return view('dashboard.wilayah', compact('provinsi'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function provinsi()
    {
        $prov = DB::table('provinsi')
            ->join('kabupaten', 'provinsi.id', '=', 'kabupaten.id_provinsi')
            ->join('kecamatan', 'kabupaten.id', '=', 'kecamatan.id_kabupaten')
            ->join('desa', 'kecamatan.id', '=', 'desa.id_kecamatan')
            ->leftJoin('pendaftar', 'desa.id', '=', 'pendaftar.id_desa_sekarang')
            ->select('provinsi.*', DB::raw('count(pendaftar.id_desa_sekarang) as total'))
            ->groupBy('provinsi.id')
            ->get();
        return json_encode($prov);
    }

    public function kabupaten($id)
    {
        $kab = DB::table('kabupaten')
            ->join('kecamatan', 'kabupaten.id', '=', 'kecamatan.id_kabupaten')
            ->join('desa', 'kecamatan.id', '=', 'desa.id_kecamatan')
            ->leftJoin('pendaftar', 'desa.id', '=', 'pendaftar.id_desa_sekarang')
            ->select('kabupaten.*', DB::raw('count(pendaftar.id_desa_sekarang) as total'))
            ->where('kabupaten.id_provinsi', '=', $id)
            ->groupBy('kabupaten.id')
            ->get();
        return json_encode($kab);
    }
    public function kecamatan($id)
    {
        $kec = DB::table('kecamatan')
            ->join('desa', 'kecamatan.id', '=', 'desa.id_kecamatan')
            ->leftJoin('pendaftar', 'desa.id', '=', 'pendaftar.id_desa_sekarang')
            ->select('kecamatan.*', DB::raw('count(pendaftar.id_desa_sekarang) as total'))
            ->where('kecamatan.id_kabupaten', '=', $id)
            ->groupBy('kecamatan.id')
            ->get();
        return json_encode($kec);
    }
    public function desa($id)
    {
        $desa = DB::table('desa')
            ->leftJoin('pendaftar', 'desa.id', '=', 'pendaftar.id_desa_sekarang')
            ->select('desa.*', DB::raw('count(pendaftar.id_desa_sekarang) as total'))
            ->where('desa.id_kecamatan', '=', $id)
            ->groupBy('desa.id')
            ->get();
        return json_encode($desa);
    }
    public function desaById($id)
    {
        $desa = DB::table('desa')
            ->join('kecamatan', 'kecamatan.id', '=', 'desa.id_kecamatan')
            ->join('kabupaten', 'kabupaten.id', '=', 'kecamatan.id_kabupaten')
            ->join('provinsi', 'provinsi.id', '=', 'kabupaten.id_provinsi')
            ->select('desa.id', 'desa.nama as desa', 'id_kecamatan', 'kecamatan.nama  as kecamatan', 'id_kabupaten', 'kabupaten.nama as kabupaten', 'id_provinsi', 'provinsi.nama as provinsi')
            ->where('desa.id', '=', $id)
            ->first();
        if (!$desa) {
            abort(404);
        }
        return response()->json($desa);
    }
}
