<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TPenjualan;
use App\Models\TPenjualanDetail;
use App\Models\MBarang;
use App\Models\MUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class PenjualanController extends Controller
{
    public function index()
    {
        return TPenjualan::with('details')->get();
    }

    public function store(Request $request): JsonResponse
    {   
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'penjualan_kode' => 'required',
            'details' => 'array', // Make details optional
            'details.*.barang_id' => 'required_with:details|integer',
            'details.*.jumlah' => 'required_with:details|integer|min:1', // Make jumlah required only if details are provided
        ], [
            'required' => ':attribute harus diisi',
            'required_with' => 'Kolom :attribute harus diisi jika details disertakan.'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        try {
            DB::beginTransaction();
    
            // Retrieve user's information
    
            // Create the TPenjualan instance with provided penjualan_kode and current timestamp as penjualan_tanggal
            $penjualan = TPenjualan::create([
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli, // Use buyer's name from MUser or fallback to an empty string
                'penjualan_kode' => $request->penjualan_kode, // Use provided penjualan_kode
                'penjualan_tanggal' => now(), // Set penjualan_tanggal to current date and time
            ]);
    
            // Create the associated details if details are provided
            if ($request->has('details')) {
                foreach ($request->details as $detail) {
                    // Retrieve the barang by ID
                    $barang = MBarang::findOrFail($detail['barang_id']);
    
                    // Calculate the harga based on harga_jual * jumlah
                    $harga = $barang->harga_jual * $detail['jumlah'];
    
                    // Create the TPenjualanDetail instance
                    $penjualan->details()->create([
                        'detail_id' => (string) Str::uuid(), // Generate a UUID as detail_id
                        'barang_id' => $detail['barang_id'],
                        'harga' => $harga, // Set the calculated harga
                        'jumlah' => $detail['jumlah'],
                    ]);
                }
            }
    
            DB::commit();
    
            return response()->json($penjualan, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }
    
    

    public function show(TPenjualan $penjualan)
    {
        return response()->json($penjualan->load('details'), 200);
    }

    public function update(Request $request, TPenjualan $penjualan)
    {
        // Update penjualan
        $penjualan->update($request->except('details'));

        // Update details
        foreach ($request->details as $detail) {
            TPenjualanDetail::updateOrCreate(
                ['penjualan_id' => $penjualan->penjualan_id, 'barang_id' => $detail['barang_id']],
                $detail
            );
        }

        return response()->json($penjualan->load('details'), 200);
    }

    public function destroy($penjualan_id)
    {
        try {
            DB::beginTransaction();
    
            // Find the TPenjualan instance by ID
            $penjualan = TPenjualan::findOrFail($penjualan_id);
    
            // Delete details associated with the penjualan
            $penjualan->details()->delete();
    
            // Delete the penjualan
            $penjualan->delete();
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Data terhapus'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'code' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }
    
}
