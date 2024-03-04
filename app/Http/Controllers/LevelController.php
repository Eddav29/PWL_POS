<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index() {
        // DB::insert('insert into m_level (level_id, level_kode, level_nama, created_at) values(?, ?, ?, ?)', [4, 'CUS', 'Pelanggan', now()]);

        // return 'insert data berhasil';

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return "Update data berhasil. Jumlah data yang di update " . $row . " baris";

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return "Delete data berhasil. Jumlah data yang di delete " . $row . " baris";

        $data = DB::select('select * from m_levels');
        return view('level.index', ['datas' => $data]);
    }
}