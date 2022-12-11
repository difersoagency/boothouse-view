<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengiriman extends Model
{
    use HasFactory;
    protected $table = 'jenis_pengiriman';
    protected $fillable = [
        'nama'
    ];
    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
