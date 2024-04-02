<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DataTables\KategoriDataTable;
use App\Models\MKategori;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;
class KategoriController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori',
            'list' => ['Home','Kategori']
        ];

        $page = (object)[
            'title' => 'Daftar Kategori yang ada'
        ];

        $activeMenu = 'kategori'; // Set menu yang sedang aktif

        $kategori = MKategori::all(); // ambil data kategori untuk filter kategori
        return view('kategori.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'kategori'=>$kategori, 'activeMenu'=>$activeMenu]);
    }

    public function list(Request $request){
        $kategoris = MKategori::select('kategori_id', 'kategori_kode', 'kategori_nama');
                    
        // 
        if ($request->kategori_id){
            $kategoris->where('kategori_id',$request->kategori_id);
        }

        return DataTables::of($kategoris)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nmaa kolom: DT_RowINdex)
            ->addColumn('aksi', function ($kategori){
                $btn = '<a href="'.url('/kategori/' . $kategori->kategori_id).'" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="'.url('/kategori/' . $kategori->kategori_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/kategori/'.$kategori->kategori_id).'">'. csrf_field() . method_field('DELETE') 
                . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data 
                ini?\');">Hapus</button></form>'; 
                return $btn;
            })

            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Kategori baru'        
        ];

        $kategori = MKategori::all(); // ambil data kategori untuk ditampilkan di form
        $activeMenu = 'kategori'; //set menu yang sedang aktif

        return view('kategori.create', ['breadcrumb'=>$breadcrumb,'page'=>$page, 'kategori' => $kategori, 'activeMenu'=>$activeMenu]);
    }


    public function store(Request $request){
        $request->validate([
            'kategori_kode'   => 'required|string|min:3|unique:m_kategoris,kategori_kode',
            'kategori_nama'   => 'required|string|max:100',
            
        ]);

        MKategori::create([
            'kategori_kode'    => $request->kategori_kode,
            'kategori_nama'    => $request->kategori_nama,
            
        ]);

        return redirect('/kategori')->with('success', 'Data Kategori berhasil disimpan');

        
    }

    public function show(string $id){
        $kategori = MKategori::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail kategori',
            'list' => ['Home','kategori','Detail']
        ];

        $page = (object)[
            'title' => 'Detail Kategori'
        ];

        $activeMenu = 'kategori';
        return view('kategori.show',['breadcrumb' => $breadcrumb, 'page'=> $page, 'kategori'=>$kategori, 'activeMenu' => $activeMenu]);
    }


    public function edit(string $id){
        $kategori = MKategori::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit Kategori',
            'list' => ['Home','Kategori','Edit']
        ];

        $page = (object)[
            'title' => 'Edit Kategori'
        ];

        $activeMenu = 'kategori';
        return view('kategori.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'kategori'=> $kategori,'activeMenu'=>$activeMenu]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'kategori_kode'    => 'required|string|min:3|unique:m_kategoris,kategori_kode,'.$id.',kategori_id',
            'kategori_nama'    => 'required|string|max:100',
            
        ]);

        MKategori::find($id)->update([
            'kategori_kode'    => $request->kategori_kode,
            'kategori_nama'    => $request->kategori_nama,
            
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    public function destroy(string $id){
        $check = MKategori::find($id);
        if(!$check){
            return redirect('/kategori')->with('error','Data Kategori tidak ditemukan');
        }

        try{
            MKategori::destroy($id); // Hapus data kategori
            
            return redirect('/kategori')->with('success', 'Data Kategori berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // Jika terjadi error ketika menghapus data , redirect kemabli ke halaman dengan membawa pesan error
            return redirect('/kategori')->with('errror', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
// // public function index(KategoriDataTable $dataTable) {
//     //     return $dataTable->render('kategori.index');
//     // }

//     // public function create(){
//     //     return view('kategori.create');
//     // }

//     // public function store(Request $request){

//     //     $request->validate([
//     //         'kategori_kode' => ['required','unique:posts', 'min:5'],
//     //         'kategori_nama' => 'required',
//     //     ]);

//     //     MKategori::create ( [
//     //         'kategori_kode' => $request->kodeKategori,
//     //         'kategori_nama' => $request->namaKategori,
//     //     ]);
//     //     return redirect('/kategori');
//     // }
//     // // Metode untuk menampilkan halaman edit
//     // public function edit($id)
//     // {
//     //     // Ambil data kategori berdasarkan ID
//     //     $kategori = MKategori::findOrFail($id);

//     //     // Tampilkan halaman edit dengan data kategori yang dipilih
//     //     return view('kategori.edit', compact('kategori'));
//     // }

//     // // Metode untuk menyimpan perubahan data setelah proses edit
//     // public function update(Request $request, $id)
//     // {
//     //     // Validasi data yang dikirimkan
//     //     $request->validate([
//     //         'kategori_kode' => 'required',
//     //         'kategori_nama' => 'required',
//     //     ]);

//     //     // Temukan data kategori berdasarkan ID
//     //     $kategori = MKategori::findOrFail($id);

//     //     // Update data kategori dengan data yang dikirimkan dari formulir edit
//     //     $kategori->update($request->all());

//     //     // Redirect ke halaman yang sesuai setelah berhasil melakukan update
//     //     return redirect()->route('/kategori/index')->with('success', 'Data kategori berhasil diperbarui.');
//     // }
//     // public function hapus($id)
//     // {
//     //     // Temukan data kategori berdasarkan ID
//     //     $kategori = MKategori::findOrFail($id);

//     //     // Hapus data kategori
//     //     $kategori->delete();

//     //     // Redirect kembali ke halaman yang sesuai setelah berhasil menghapus
//     //     return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus.');
//     // }
    
//     public function index(){
    


