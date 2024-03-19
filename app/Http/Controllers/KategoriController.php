<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DataTables\KategoriDataTable;
use App\Models\MKategori;
class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable) {
        return $dataTable->render('kategori.index');
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request){

        MKategori::create ( [
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    // Metode untuk menampilkan halaman edit
    public function edit($id)
    {
        // Ambil data kategori berdasarkan ID
        $kategori = MKategori::findOrFail($id);

        // Tampilkan halaman edit dengan data kategori yang dipilih
        return view('kategori.edit', compact('kategori'));
    }

    // Metode untuk menyimpan perubahan data setelah proses edit
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'kategori_kode' => 'required',
            'kategori_nama' => 'required',
        ]);

        // Temukan data kategori berdasarkan ID
        $kategori = MKategori::findOrFail($id);

        // Update data kategori dengan data yang dikirimkan dari formulir edit
        $kategori->update($request->all());

        // Redirect ke halaman yang sesuai setelah berhasil melakukan update
        return redirect()->route('/kategori/index')->with('success', 'Data kategori berhasil diperbarui.');
    }
    public function hapus($id)
    {
        // Temukan data kategori berdasarkan ID
        $kategori = MKategori::findOrFail($id);

        // Hapus data kategori
        $kategori->delete();

        // Redirect kembali ke halaman yang sesuai setelah berhasil menghapus
        return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus.');
    }
}

