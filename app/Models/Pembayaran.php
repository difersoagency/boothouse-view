<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = [
        'order_id',
        'tanggal',
        'total_bayar',
    ];
    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
