<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBooth extends Model
{
    use HasFactory;
    protected $table = 'detail_booth';
    protected $fillable = [
        'jenis_booth_id',
        'ukuran',
        'harga',
    ];

    public function JenisBooth()
    {
        return $this->belongsTo(JenisBooth::class, 'jenis_booth_id');
    }
    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function DetailOrder()
    {
        return $this->hasMany(DetailOrder::class);
    }
}
