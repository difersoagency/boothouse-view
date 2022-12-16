<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'no_telp',
    ];

    public function Order()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
