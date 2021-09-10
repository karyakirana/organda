<?php

namespace App\Models\Master;

use App\Models\Nopol\Sticker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $keyType = 'string';

    protected $fillable = [
        'id_cust',
        'nama_cust',
        'telp_cust',
        'alamat_cust',
        'status'
    ];

    public function sticker()
    {
        return $this->hasMany(Sticker::class, 'id_cust', 'id_cust');
    }
}
