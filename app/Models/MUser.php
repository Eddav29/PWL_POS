<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MUser extends Model
{
    use HasFactory;

    protected $table = 'm_users';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id','username','nama','password'];
    // protected $fillable = ['level_id','username','nama'];

    public function level(): belongsTo{
        return $this->belongsTo(MLevel::class,'level_id','level_id');
    }

}
