<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    public function hang()
    {
        return $this->belongsTo(Hang::class, 'MaHang', 'MaHang');
    }

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'MaDM', 'MaDM');
    }

    public function sanPhamcts()
    {
        return $this->hasMany(ChiTietSanPham::class, 'MaSP', 'MaSP');
    }
}
