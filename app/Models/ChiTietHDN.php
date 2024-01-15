<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHDN extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_h_d_n_s";

    public function soluong()
    {
        return $this->belongsTo(ChiTietSanPham::class, 'MaCTSP', 'MaCTSP');
    }
}
