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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->string('judul')->unique(); // Menambahkan unique constraint untuk judul
            $table->text('deskripsi');
            $table->unsignedInteger('durasi'); // Menggunakan unsignedInteger untuk durasi karena durasi tidak bisa negatif
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
