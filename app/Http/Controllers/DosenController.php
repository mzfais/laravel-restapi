<?php

namespace App\Http\Controllers;

use App\Dosen;
use Exception;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsn = Dosen::all();
        if ($dsn->count() > 0) {
            return response(['status' => true, 'data' => $dsn], 200);
        } else {
            return response(['status' => false, 'message' => 'Data dosen tidak ditemukan'], 404);
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
        $dsn = new Dosen();
        $dsn->nip = $request->nip;
        $dsn->nama_dosen = $request->nama;
        $dsn->alamat_dosen = $request->alamat;
        $dsn->prodi = $request->prodi;
        try {
            $dsn->save();
            return response(['status' => true, 'message' => 'Data dosen telah ditambahkan'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'Data dosen gagal ditambahkan ' . $x->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dsn = Dosen::find($id);
        if (!is_null($dsn) && $dsn->count() > 0) {
            return response(['status' => true, 'data' => $dsn], 200);
        } else {
            return response(['status' => false, 'message' => 'Data dosen tidak ditemukan'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if (is_null($id)) {
            return response(['status' => false, 'message' => 'Masukkan ID dosen yang akan diupdate'], 400);
        }
        $dsn = Dosen::find($id);
        $dsn->nama_dosen = $request->nama;
        $dsn->alamat_dosen = $request->alamat;
        $dsn->prodi = $request->prodi;
        try {
            $dsn->save();
            return response(['status' => true, 'message' => 'Data dosen telah diupdate'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'Data dosen gagal diupdate ' . $x->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        if (is_null($id)) {
            return response(['status' => false, 'message' => 'Masukkan ID dosen yang akan dihapus'], 400);
        }
        $dsn = Dosen::find($id);
        try {
            $dsn->delete();
            return response(['status' => true, 'message' => 'Data dosen telah dihapus'], 200);
        } catch (Exception $x) {
            return response(['status' => false, 'message' => 'Data dosen gagal dihapus ' . $x->getMessage()], 500);
        }
    }
}
