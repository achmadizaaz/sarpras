<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('ruangan_id')->nullable();
            $table->foreignId('sumber_id')->nullable();

            $table->string('image');
            $table->string('kode');
            $table->string('nama');
            $table->string('merk');
            $table->text('spesifikasi');
            $table->integer('jumlah');
            $table->double('harga');
            $table->double('total');
            
            $table->timestamps();
            
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('set null');
            $table->foreign('sumber_id')->references('id')->on('sumbers')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
