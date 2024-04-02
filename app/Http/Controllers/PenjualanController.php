<?php

namespace App\Http\Controllers;

use App\Models\TPenjualan;
use App\Models\MUser;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Transaksi Penjualan',
            'list' => ['Home','Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar Transaksi Penjualan'
        ];

        $activeMenu = 'penjualan'; // Set menu yang sedang aktif

        $user = MUser::all(); // ambil data level untuk filter level
        $penjualan = TPenjualan::all();
        return view('penjualan.index',['breadcrumb'=>$breadcrumb,'page'=>$page,'user'=>$user, 'user'=>$user,'activeMenu'=>$activeMenu]);
    }

    public function list(Request $request){
        $penjualans = TPenjualan::select('penjualan_id', 'user_id','pembeli', 'penjualan_kode','penjualan_tanggal')
                    ->with('user');
                    
        // Filter data stok bedasarkan level_id
        if ($request->user_id){
            $penjualans->where('user_id',$request->user_id);
        }

        

                    

        return DataTables::of($penjualans)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nmaa kolom: DT_RowINdex)
            ->addColumn('aksi', function ($penjualan){
                $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="'.url('/penjualan/' . $penjualan->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/penjualan/'.$penjualan->penjualan_id).'">'. csrf_field() . method_field('DELETE') 
                . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data 
                ini?\');">Hapus</button></form>'; 
                return $btn;
            })

            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Penjualan baru'        
        ];

        $user = MUser::all(); // ambil data untuk filter 

        $activeMenu = 'penjualan'; //set menu yang sedang aktif

        return view('penjualan.create', ['breadcrumb'=>$breadcrumb,'page'=>$page, 'user' => $user,'activeMenu'=>$activeMenu]);
    }


    public function store(Request $request){
        $request->validate([
            'penjualan_kode'   => 'required|string|min:4|unique:t_penjualans,penjualan_kode',
            'user_id'         => 'required|integer',
            'penjualan_tanggal'    => 'required|date',
            'pembeli'     => 'required|string|max:100',
        ]);

        TPenjualan::create([
            'penjualan_kode'        => $request->penjualan_kode,
            'user_id'               => $request->user_id,
            'penjualan_tanggal'     => $request->penjualan_tanggal,
            'pembeli'               => $request->pembeli,
        ]);

        return redirect('/penjualan')->with('success', 'Data pembeli berhasil disimpan');

        
    }

    public function show(string $id){
        $penjualan = TPenjualan::with('user')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Penjualan',
            'list' => ['Home','Penjualan','Detail']
        ];

        $page = (object)[
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'penjualan';
        return view('penjualan.show',['breadcrumb' => $breadcrumb, 'page'=> $page, 'penjualan'=>$penjualan, 'activeMenu' => $activeMenu]);
    }


    public function edit(string $id){
        $penjualan = TPenjualan::find($id);
        $user = MUser::all();

        $breadcrumb = (object)[
            'title' => 'Edit Penjualan',
            'list' => ['Home','Penjualan','Edit']
        ];

        $page = (object)[
            'title' => 'Edit Penjualan'
        ];

        $activeMenu = 'Penjualan';
        return view('penjualan.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'penjualan'=>$penjualan,'user'=> $user, 'activeMenu'=>$activeMenu]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            'penjualan_kode'   => 'required|string|min:4|unique:t_penjualans,penjualan_kode,'.$id.',penjualan_id',
            'user_id'         => 'required|integer',
            'penjualan_tanggal'    => 'required|date',
            'pembeli'     => 'required|string|max:100',
        ]);

        TPenjualan::find($id)->update([
            'penjualan_kode'        => $request->penjualan_kode,
            'user_id'               => $request->user_id,
            'penjualan_tanggal'     => $request->penjualan_tanggal,
            'pembeli'               => $request->pembeli,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy(string $id){
        $check = MUser::find($id);
        if(!$check){
            return redirect('/penjualan')->with('error','Data penjualan tidak ditemukan');
        }

        try{
            TPenjualan::destroy($id); // Hapus data level
            
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            // Jika terjadi error ketika menghapus data , redirect kemabli ke halaman dengan membawa pesan error
            return redirect('/penjualan')->with('errror', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}