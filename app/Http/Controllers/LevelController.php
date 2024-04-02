<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MLevel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class LevelController extends Controller
{
    // public function index() {
    //     // DB::insert('insert into m_level (level_id, level_kode, level_nama, created_at) values(?, ?, ?, ?)', [4, 'CUS', 'Pelanggan', now()]);

    //     // return 'insert data berhasil';

    //     // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
    //     // return "Update data berhasil. Jumlah data yang di update " . $row . " baris";

    //     // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
    //     // return "Delete data berhasil. Jumlah data yang di delete " . $row . " baris";

    //     $data = DB::select('select * from m_levels');
    //     return view('level.index', ['datas' => $data]);
    // }
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list'  => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level'; //set menu yang sedang aktif
        $level = MLevel::all(); //UNTUK FILTERING
        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level,
        'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $levels = MLevel::select('level_id', 'level_kode', 'level_nama');

        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()  //menambahkan kolom index/ no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function($level) {
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">' . csrf_field() . method_field('DELETE').
                        '<button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }  
    
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list'  => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        $level = MLevel::all();
        $activeMenu = 'level';

        return view('level.create', 
        [
            'breadcrumb' => $breadcrumb, 
            'page'       => $page,
            'level'      => $level,
            'activeMenu' => $activeMenu,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode'     => 'required|max:255',                         
            'level_nama'     => 'required|unique:m_levels|max:255',                                         
        ]);

        MLevel::create([
            'level_kode'     => $request->level_kode,
            'level_nama'     => $request->level_nama,
        ]);
        return redirect('/level')->with('success', 'Data Level berhasil disimpan');
    }

    //Menampilkan detail Level
    public function show(String $id)
    {
        $level = MLevel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list'  => ['Home', 'Level', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Level'
        ];

        $activeMenu = 'level';       //set menu yang sedang aktif
        return view('level.show', 
        [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'level'       => $level,
            'activeMenu' => $activeMenu,
        ]);
    }

    //Menampilkan halaman form edit user
    public function edit(String $id)
    {
        $level = MLevel::find($id);

        $breadcrumb = (object) [
            'title' => 'Level User',
            'list'  => ['Home', 'Level', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit level'
        ];

        $activeMenu = 'level'; //set menu yang sedang aktif

        return view('level.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    //Menyimpan perubahan data level
    public function update(Request $request, string $id)
    {
        $request->validate([
            //levelname harus didisi, berupa string, minimal 3 karakter,
            //dan bernilai unik ditabel m_levels kolom level kecuali untuk level dengan id yang sedang diedit
            'level_kode'     => 'required|max:255', 
            'level_nama'     => 'required|unique:m_levels|max:255',
           
        ]);

        MLevel::find($id)->update([
            'level_kode'     => $request->level_kode, 
            'level_nama'     => $request->level_nama,
        ]);

        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    //Menghapus data level
    public function destroy(string $id)
    {
        $check = MLevel::find($id);
        if (!$check) {      //untuk mengecek apakah data level dengan id yang dimaksud ada atau tidak
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try{
            MLevel::destroy($id);    //Hapus data level

            return redirect('/level')->with('seccess', 'Data level berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){

            //Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkai dengan data ini');
        }
    }
}