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
        Schema::create('anhs', function (Blueprint $table) {
            $table->string('MaAnh')->primary();
            $table->string('TenAnh');
            $table->string('AnhLienQuan');
            $table->string('MaCTSP');
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
        Schema::dropIfExists('anhs');
    }
};
