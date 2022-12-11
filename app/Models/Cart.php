<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'customer_id',
        'detail_booth_id',
        'image_file',
        'warna_booth',
        'text',
        'hasil_custom',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function DetailBooth()
    {
        return $this->belongsTo(DetailBooth::class, 'detail_booth_id');
    }
}
