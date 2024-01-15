<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_san_phams";

    public function sp()
    {
        return $this->belongsTo(SanPham::class, 'MaSP', 'MaSP');
    }

    public function hoadonnhap()
    {
        return $this->hasMany(ChiTietSanPham::class, 'MaCTSP', 'MaCTSP');
    }

    public function mau()
    {
        return $this->belongsTo(MauSac::class, 'MaMau', 'MaMau');
    }

    public function dungluong()
    {
        return $this->belongsTo(DungLuong::class, 'MaDL', 'MaDL');
    }
}
