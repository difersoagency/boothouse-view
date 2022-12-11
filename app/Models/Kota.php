<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'kota';
    protected $fillable = [
        'provinsi_id',
        'nama',
        'biaya_kirim',
    ];

    public function Provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
