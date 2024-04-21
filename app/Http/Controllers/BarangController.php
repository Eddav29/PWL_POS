<?php
namespace App\Http\Controllers;

use App\Models\MBarang;
use App\Models\MKategori;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Barang',
            'list' => ['Home','Barang']
        ];

        $page = (object)[
            'title' => 'Daftar Barang yang sudah dimasukkan'
        ];

        $activeMenu = 'barang'; // Set menu yang sedang aktif

        $kategori = MKategori::all(); // ambil data barang untuk filter barang
        return view('barang.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'kategori'=>$kategori, 'activeMenu'=>$activeMenu]);
    }

    public function list(Request $request){
        $barangs = MBarang::select('barang_id', 'barang_kode','barang_nama', 'kategori_id','harga_beli','harga_jual')
                    ->with('kategori');
        // 
        if ($request->kategori_id){
            $barangs->where('kategori_id',$request->kategori_id);
        }

                    

        return DataTables::of($barangs)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nmaa kolom: DT_RowINdex)
            ->addColumn('aksi', function ($barang){
                $btn = '<a href="'.url('/barang/' . $barang->barang_id).'" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="'.url('/barang/' . $barang->barang_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/barang/'.$barang->barang_id).'">'. csrf_field() . method_field('DELETE') 
                . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data 
                ini?\');">Hapus</button></form>'; 
                return $btn;
            })

            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Barang baru'        
        ];

        $kategori = MKategori::all(); // ambil data barang untuk ditampilkan di form
        $activeMenu = 'barang'; //set menu yang sedang aktif

        return view('barang.create', ['breadcrumb'=>$breadcrumb,'page'=>$page, 'kategori' => $kategori, 'activeMenu'=>$activeMenu]);
    }


    public function store(Request $request){
        $request->validate([
            'barang_kode'   => 'required|string|min:3|unique:m_levels,level_kode',
            'barang_nama'   => 'required|string|max:100',
            'kategori_id'   => 'required|integer',
            'harga_beli'    => 'required|integer',
            'harga_jual'    => 'required|integer'
            
        ]);

        MBarang::create([
            'barang_kode'   => $request->barang_kode,
            'barang_nama'   => $request->barang_nama,
            'kategori_id'   => $request->kategori_id,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual
            
        ]);

        return redirect('/barang')->with('success', 'Data Level berhasil disimpan');

        
    }

    public function show(string $id){
        $barang = MBarang::with('kategori')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail barang',
            'list' => ['Home','barang','Detail']
        ];

        $page = (object)[
            'title' => 'Detail Barang'
        ];

        $activeMenu = 'barang';
        return view('barang.show',['breadcrumb' => $breadcrumb, 'page'=> $page, 'barang'=>$barang, 'activeMenu' => $activeMenu]);
    }


    public function edit(string $id){
        $barang = MBarang::find($id);
        $kategori = MKategori::all();

        $breadcrumb = (object)[
            'title' => 'Edit Barang',
            'list' => ['Home','Barang','Edit']
        ];

        $page = (object)[
            'title' => 'Edit Barang'
        ];

        $activeMenu = 'barang';
        return view('barang.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'barang'=> $barang,'kategori'=>$kategori,'activeMenu'=>$activeMenu]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'barang_kode'   => 'required|string|min:3|unique:m_barangs,barang_kode,'.$id.',barang_id',
            'barang_nama'   => 'required|string|max:100',
            'kategori_id'   => 'required|integer',
            'harga_beli'    => 'required|integer',
            'harga_jual'    => 'required|integer'
            
        ]);

        MBarang::find($id)->update([
            'barang_kode'   => $request->barang_kode,
            'barang_nama'   => $request->barang_nama,
            'kategori_id'   => $request->kategori_id,
            'harga_beli'    => $request->harga_beli,
            'harga_jual'    => $request->harga_jual
            
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id){
        $check = MBarang::find($id);
        if(!$check){
            return redirect('/barang')->with('error','Data Level tidak ditemukan');
        }

        try{
            MBarang::destroy($id); // Hapus data barang
            
            return redirect('/barang')->with('success', 'Data Level berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // Jika terjadi error ketika menghapus data , redirect kemabli ke halaman dengan membawa pesan error
            return redirect('/barang')->with('errror', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}

