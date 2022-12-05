<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();
        if ($data->count() > 0) {
            return response(['status' => true, 'data' => $data], 200);
        } else {
            return response(['status' => false, 'message' => 'data mahasiwa tidak ditemukan'], 404);
        }
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
        $mhs = new Mahasiswa();
        $mhs->nim = $request->nim;
        $mhs->nama_mhs = $request->nama;
        $mhs->alamat_mhs = $request->alamat;
        $mhs->prodi = $request->prodi;
        try {
            $mhs->save();
            return response(['status' => true, 'message' => 'data mahasiwa telah ditambahkan'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'terjadi kesalahan saat menambah mahasiwa baru'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mhs = Mahasiswa::find($id);
        if ($mhs->count() > 0) {
            return response(['status' => true, 'data' => $mhs], 200);
        } else {
            return response(['status' => false, 'message' => 'data mahasiwa tidak ditemukan'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if (is_null($id)) {
            return response(['status' => false, 'message' => 'masukkan id mahasiswa yang akan diupdate'], 404);
        }
        $mhs = Mahasiswa::find($id);
        $mhs->nama_mhs = $request->nama;
        $mhs->alamat_mhs = $request->alamat;
        $mhs->prodi = $request->prodi;
        try {
            $mhs->save();
            return response(['status' => true, 'message' => 'data mahasiwa telah diupdate'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'terjadi kesalahan saat mengupdate data mahasiwa'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        if (is_null($id)) {
            return response(['status' => false, 'message' => 'masukkan id mahasiswa yang akan dihapus'], 404);
        }
        $mhs = Mahasiswa::find($id);
        try {
            $mhs->delete();
            return response(['status' => true, 'message' => 'data mahasiwa telah dihapus'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'terjadi kesalahan saat menghapus data mahasiwa'], 500);
        }
    }
}
