<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBooth extends Model
{
    use HasFactory;
    protected $table = 'jenis_booth';
    protected $fillable = [
        'nama'
    ];

    public function DetailBooth()
    {
        return $this->hasMany(DetailBooth::class);
    }
}
