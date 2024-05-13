<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MBarang extends Model
{
    use HasFactory;
    protected $table = 'm_barangs';
    protected $primaryKey = 'barang_id';

    protected $fillable = ['kategori_id','barang_kode', 'barang_nama', 'harga_beli', 'harga_jual','image'];

    public function kategori(): BelongsTo{
        return $this->belongsTo(MKategori::class, 'kategori_id', 'kategori_id');
    }

    public function stoks():HasMany{
        return $this->hasMany(StokModel::class);
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}