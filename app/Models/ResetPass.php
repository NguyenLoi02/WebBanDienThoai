<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPass extends Model
{
    use HasFactory;
    protected $table = "reset_pass";
    protected $fillable = [
        'Email',
        'Token',

    ];
}
