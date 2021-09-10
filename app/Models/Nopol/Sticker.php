<?php

namespace App\Models\Nopol;

use App\Models\Master\Customer;
use App\Models\Master\Mobil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sticker extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi_sticker';
    protected $fillable = [
        'tgl_sticker',
        'masa_berlaku',
        'kode_sticker',
        'id_mobil',
        'id_cust',
        'perusahaan',
        'status',
        'keterangan'
    ];

    protected $casts = [
        'tgl_sticker'=>'datetime:d-M-Y',
        'masa_berlaku'=>'datetime:d-M-Y',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_cust', 'id_cust');
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil', 'id_mobil');
    }
}
