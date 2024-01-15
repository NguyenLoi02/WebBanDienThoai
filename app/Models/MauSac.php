<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    use HasFactory;
    protected $table = "mau_sacs";

    public function sanPhamcts()
    {
        return $this->hasMany(MauSac::class, 'MaMau', 'MaMau');
    }
}
