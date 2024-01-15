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
        Schema::create('phieu_bao_hanhs', function (Blueprint $table) {
            $table->string('MaPBH')->primary();
            $table->date('NgayBH');
            $table->string('TinhTrangBH');
            $table->string('NVBH');
            $table->date('NgayHoanThanh');
            $table->string('MaHDB');
            $table->foreign('MaHDB')->references('MaHDB')->on('hoa_don_bans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_bao_hanhs');
    }
};
