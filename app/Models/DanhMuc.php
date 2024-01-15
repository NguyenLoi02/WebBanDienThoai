<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = "danh_mucs";
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'MaDM', 'MaDM');
    }
}
