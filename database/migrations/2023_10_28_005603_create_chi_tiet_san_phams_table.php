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
        Schema::create('chi_tiet_san_phams', function (Blueprint $table) {
            $table->string('MaCTSP')->primary();
            $table->string('AnhCT')->nullable();
            $table->double('DonGiaNhap');
            $table->double('DonGiaBan');
            $table->tinyInteger('SoLuong');
            $table->string('MoTa');
            $table->string('TrangThai');
            $table->string('MaSP');
            $table->string('MaMau');
            $table->string('MaDL');
            $table->foreign('MaSP')->references('MaSP')->on('san_phams');
            $table->foreign('MaMau')->references('MaMau')->on('mau_sacs');
            $table->foreign('MaDL')->references('MaDL')->on('dung_luongs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_san_phams');
    }
};
