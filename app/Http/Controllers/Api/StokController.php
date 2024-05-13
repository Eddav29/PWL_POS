<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TStok;

class StokController extends Controller
{
    public function index()
    {
        return TStok::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $stok = TStok::create($request->all());

        return response()->json($stok, 201);
    }

    public function show(TStok $stok)
    {
        return response()->json($stok, 200);
    }

    public function update(Request $request, TStok $stok)
    {
        $validator = Validator::make($request->all(), [
            'barang_id' => 'required',
            'user_id' => 'required',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $stok->update($request->all());

        return response()->json($stok, 200);
    }

    public function destroy(TStok $stok)
    {
        $stok->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
