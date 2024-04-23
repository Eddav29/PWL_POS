<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MBarang;

class BarangController extends Controller
{
    public function index()
    {
        return MBarang::all();
    }

    public function store(Request $request)
    {
        $barang = MBarang::create($request->all());
        return response()->json($barang, 201);
    }

    public function show(MBarang $barang)
    {
        return MBarang::find($barang);
    }

    public function Update(Request $request, MBarang $barang)
    {
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function destroy(MBarang $barang)
    {
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}