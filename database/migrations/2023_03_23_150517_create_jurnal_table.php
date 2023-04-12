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
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id('id_jurnal');
            $table->string('no_transaksi');
            $table->date('tgl_transaksi');
            $table->string('no_rekening');
            $table->decimal('debet_rupiah', 20, 2);
            $table->decimal('kredit_rupiah', 20, 2);
            $table->string('kas_masuk_id')->nullable();
            $table->string('kas_keluar_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal');
    }
};
