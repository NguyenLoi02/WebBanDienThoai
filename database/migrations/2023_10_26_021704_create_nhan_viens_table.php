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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->string('MaNV')->primary();
            $table->string('HoTen')->nullable();
            $table->string('DiaChi')->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('Email')->nullable();
            $table->string('SoDienThoai')->nullable();
            $table->string('GioiTinh')->nullable();
            $table->string('Username')->nullable();
            $table->foreign('Username')->references('Username')->on('tai_khoans');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
