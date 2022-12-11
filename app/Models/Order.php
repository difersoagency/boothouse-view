<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'no_order',
        'tgl_order',
        'customer_id',
        'total_harga',
        'jenis_pengiriman_id',
        'tgl_kirim',
        'alamat',
        'kota_id',
        'no_telp',
        'biaya_kirim',
        'resi',
        'status_id',
    ];
    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function Kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function Pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
    public function DetailOrder()
    {
        return $this->hasMany(DetailOrder::class);
    }
    public function JenisPengiriman()
    {
        return $this->belongsTo(JenisPengiriman::class, 'jenis_pengiriman_id');
    }
}
