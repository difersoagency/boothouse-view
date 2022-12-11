<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'divisi_id',
        'nama',
        'no_telp',
    ];

    public function Divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
