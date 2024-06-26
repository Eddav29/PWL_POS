<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;
class m_user extends Authentication 
{
    protected $table = 'useri';
    protected $primaryKey = 'user_id';
    protected $timestamp = false;

    protected $fillable = ['user_id', 'username', 'nama', 'password', 'level_id'];

    public function level() {
        return $this->belongsTo(MLevel::class, 'level_id', 'level_id');
    }
    
}