<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    use HasFactory;

    protected $table = 'm_users';
    protected $primarykey = 'user_id';

    // protected $fillable = ['level_id','username','nama','password'];
    protected $fillable = ['level_id','username','nama'];

}
