<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    use HasFactory;
    protected $table = "hangs";
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'MaHang', 'MaHang');
    }
}
