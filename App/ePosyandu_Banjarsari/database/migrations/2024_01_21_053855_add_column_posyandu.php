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
        Schema::table('posyandu', function (Blueprint $table) {
            $table->foreignId('user_id')->after('nik')->constrained('users')->onDelete('cascade');
            $table->foreignId('p_kategori_id')->after('nik')->constrained('p_kategori')->onDelete('cascade');
            $table->foreignId('t_posyandu_id')->after('nik')->constrained('t_posyandu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
