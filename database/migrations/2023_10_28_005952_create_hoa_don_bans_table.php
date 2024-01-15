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
        Schema::create('hoa_don_bans', function (Blueprint $table) {
            $table->string('MaHDB')->primary();
            $table->date('NgayBan');
            $table->string('TrangThaiHoaDon');
            $table->string('DiaChiGiaoHang');
            $table->string('SoDienThoai');
            $table->string('GhiChu');
            $table->double('TongTien');
            $table->string('TinhTrangDonHang');
            $table->string('MaNV');
            $table->string('MaKH');
            $table->foreign('MaNV')->references('MaNV')->on('nhan_viens');
            $table->foreign('MaKH')->references('MaKH')->on('khach_hangs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_don_bans');
    }
};
