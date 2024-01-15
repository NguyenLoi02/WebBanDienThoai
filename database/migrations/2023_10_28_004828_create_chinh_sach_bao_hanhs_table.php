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
        Schema::create('chinh_sach_bao_hanhs', function (Blueprint $table) {
            $table->string('MaCSBH')->primary();
            $table->tinyInteger('ThoiGianBH');
            $table->string('NoiDung');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chinh_sach_bao_hanhs');
    }
};
