<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TPenjualanDetail extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_details';
    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
    ];

    public function penjualan()
    {
        return $this->belongsTo(TPenjualan::class, 'penjualan_id', 'penjualan_id');
    }

    public function barang()
    {
        return $this->belongsTo(MBarang::class, 'barang_id', 'barang_id');
    }
}