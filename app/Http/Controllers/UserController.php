<?php

namespace App\Http\Controllers;

use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data);

        

        // $data = [
        //         'level_id' => 2,
        //         'username' => 'manager_tiga',
        //         'nama' => 'Manager 3',
        //         'password' => Hash::make('12345')
                
        //     ];
        // MUSer::create($data);
        // $user = MUser::all();
        // $user = MUser::find(1);
        // $user = MUser::where('level_id',1)->first();
        // $user = MUser::firstWhere('level_id',1);
        
        // $user = MUser::findOr(1,['username','nama'],function(){
        //     abort(404);
        // });
        // $user = MUser::findOrFail(1);
        // $user = MUser::where('username','manager9')->firstOrFail(1);
        // $user = MUser::where('level_id',2)->count();
        // $user=MUser::firstOrCreate(
        //     [
        //         'username'=> 'manager',
        //         'nama'=> 'Manager'
        //     ]
        // );
        // $user=MUser::firstOrCreate(
        //     [
        //         'username'=> 'manager22',
        //         'nama'=> 'Manager dua dua',
        //         'password'=>Hash::make('12345'),
        //         'level_id'=>2
        //     ]
        // );
        // $user=MUser::firstOrNew(
        //     [
        //         'username'=> 'manager',
        //         'nama'=> 'Manager'
        //     ]
        // );
        // $user=MUser::firstOrNew(
        //     [
        //         'username'=> 'manager33',
        //         'nama'=> 'Manager Tiga Tiga',
        //         'password'=>Hash::make('12345'),
        //         'level_id'=>3
        //     ]
        // );
        // $user->save();
        // $user = MUser::create(
        //     [
        //         'username'  =>  'Manager55',
        //         'nama'      =>  'Manager55',  
        //         'password'  =>  Hash::make('12345'),
        //         'level_id'  =>  2
        //     ]
        // );

        // $user->username='Manager 66';
        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty(['nama','username']);

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama','username']);

        // $user->save();

        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        // $user = MUser::create(
        //     [
        //         'username'  =>  'Manager55',
        //         'nama'      =>  'Manager55',  
        //         'password'  =>  Hash::make('12345'),
        //         'level_id'  =>  2
        //     ]
        // );

        // $user->username= "Manager12";

        // $user->save();
        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged(['username','level_id']);
        // $user->wasChanged('nama');
        // $user->wasChanged(['nama','username']);
        // dd($user->wasChanged(['nama','username']));
        $user= MUser::all();
        return view('user.index', ['data' => $user]);
    }
    public function tambah(){
        return view('user.user_tambah');
    }
    public function tambah_simpan(Request $request){
        $user = MUser::create(
            [
                'username'  =>  $request->username,
                'nama'      =>  $request->nama,  
                'password'  =>  Hash::make('$request->password'),
                'level_id'  =>  $request->level_id
            ]
        );
        return redirect('/user');
    }
}