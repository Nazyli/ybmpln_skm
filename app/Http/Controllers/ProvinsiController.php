<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kabupaten;
use App\Kecamatan;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function kabupaten($id)
    {
        $kab = Kabupaten::where('id_provinsi', $id)->get();
        return json_encode($kab);
    }
    public function kecamatan($id)
    {
        $kec = Kecamatan::where('id_kabupaten', $id)->get();
        return json_encode($kec);
    }
    public function desa($id)
    {
        $desa = Desa::where('id_kecamatan', $id)->get();
        return json_encode($desa);
    }
}
