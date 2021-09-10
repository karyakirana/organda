<?php

namespace App\Models\Master;

use App\Models\Nopol\Sticker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $keyType = 'string';
    protected $fillable = [
        'id_mobil',
        'id_customer',
        'jenis_mobil',
        'nopol_mobil',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_mobil', 'id_mobil');
    }

    public function sticker()
    {
        return $this->hasMany(Sticker::class, 'id_mobil', 'id_mobil');
    }
}
