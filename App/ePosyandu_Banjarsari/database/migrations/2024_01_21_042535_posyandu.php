<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posyandu', function(Blueprint $table){
            $table->string('nik')->length(20)->primary();
            $table->string('nkk', 20);
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('alamat', 50);
            $table->string('rt_rw', 50);
            $table->integer('umur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posyandu');
    }
};
