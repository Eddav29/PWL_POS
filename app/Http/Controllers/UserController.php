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
        return view('user.index', ['data' => $user]);
    }
}