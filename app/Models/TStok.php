<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TStok extends Model
{
    use HasFactory;
    protected $table = 'm_stoks';
    protected $primaryKey = 'stok_id';

    protected $fillable = ['barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'];

    public function barang(): BelongsTo{
        return $this->belongsTo(MBarang::class, 'barang_id', 'barang_id');
    }
    public function user(): BelongsTo{
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');
    }
}
