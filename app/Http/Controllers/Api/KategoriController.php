<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MKategori;

class KategoriController extends Controller
{
    public function index()
    {
        return MKategori::all();
    }

    public function store(Request $request)
    {
        $kategori = MKategori::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show(MKategori $kategori)
    {
        return MKategori::find($kategori);
    }

    public function Update(Request $request, MKategori $kategori)
    {
        $kategori->update($request->all());
        return response()->json($kategori, 200);
    }

    public function destroy(MKategori $kategori)
    {
        $kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}