<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    protected $table = 'detail_order';
    protected $fillable = [
        'order_id',
        'detail_booth_id',
        'image_file',
        'warna_booth',
        'text',
        'hasil_custom',
    ];
    public function DetailBooth()
    {
        return $this->belongsTo(DetailBooth::class, 'detail_booth_id');
    }
    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
