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
        Schema::create('hoa_don_nhaps', function (Blueprint $table) {
            $table->string('MaHDN')->primary();
            $table->date('NgayNhap');
            $table->double('TongTien');
            $table->string('GhiChu');
            $table->string('MaNV');
            $table->string('MaNCC');
            $table->foreign('MaNV')->references('MaNV')->on('nhan_viens');
            $table->foreign('MaNCC')->references('MaNCC')->on('nha_cung_caps');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don_nhaps');
    }
};
