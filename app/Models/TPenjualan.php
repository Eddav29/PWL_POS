<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class TPenjualan extends Model
{
    use HasFactory;

    protected $table = 't_penjualans';
    protected $primaryKey = 'penjualan_id';

    protected $fillable = [
        'user_id',
        'pembeli',
        'penjualan_kode',
        'penjualan_tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');
    }

    public function details()
    {
        return $this->hasMany(TPenjualanDetail::class, 'penjualan_id', 'penjualan_id');
    }
}
