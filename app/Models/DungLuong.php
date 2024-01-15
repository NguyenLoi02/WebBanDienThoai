<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DungLuong extends Model
{
    use HasFactory;
    protected $table = "dung_luongs";

    public function sanPhamcts()
    {
        return $this->hasMany(DungLuong::class, 'MaDL', 'MaDL');
    }
}
