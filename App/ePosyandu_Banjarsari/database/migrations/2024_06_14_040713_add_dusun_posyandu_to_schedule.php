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
        Schema::table('schedule', function (Blueprint $table) {
            $table->foreignId('t_dusun_id')->after('user_id')->constrained('t_dusun')->onDelete('cascade');
            $table->foreignId('t_posyandu_id')->after('user_id')->constrained('t_posyandu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule', function (Blueprint $table) {
            $table->dropColumn('t_posyandu_id');
            $table->dropColumn('t_dusun_id');
        });
    }
};
