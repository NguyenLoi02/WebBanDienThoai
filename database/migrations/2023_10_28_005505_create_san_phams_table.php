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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->string('MaSP')->primary();
            $table->string('TenSP');
            $table->string('AnhDaiDien');
            $table->double('NamSX');
            $table->string('MaCSBH');
            $table->string('MaDM');
            $table->string('MaHang');
            $table->foreign('MaCSBH')->references('MaCSBH')->on('chinh_sach_bao_hanhs');
            $table->foreign('MaDM')->references('MaDM')->on('danh_mucs');
            $table->foreign('MaHang')->references('MaHang')->on('hangs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
