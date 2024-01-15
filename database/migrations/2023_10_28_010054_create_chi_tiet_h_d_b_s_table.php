<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_h_d_b_s', function (Blueprint $table) {
            $table->string('MaHDB');
            $table->string('maCTSP');
            $table->tinyInteger('SoLuong');
            $table->foreign('MaHDB')->references('MaHDB')->on('hoa_don_bans');
            $table->foreign('MaCTSP')->references('MaCTSP')->on('chi_tiet_san_phams');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_h_d_b_s');
    }
};
