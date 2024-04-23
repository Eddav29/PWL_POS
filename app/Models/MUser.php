<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MUser extends Authenticatable implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_users';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id','username','nama','password'];
    // protected $fillable = ['level_id','username','nama'];

    public function level(): belongsTo{
        return $this->belongsTo(MLevel::class,'level_id','level_id');
    }

}
