<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->unsignedBigInteger('dh_id');
            $table->unsignedBigInteger('sp_id');
            $table->unsignedSmallInteger('ctdh_soluong')->default('1');
            $table->unsignedInteger('ctdh_dongia')->default('1');
            
            $table->primary(['dh_id', 'sp_id']);
            $table->foreign('dh_id')->references('dh_id')->on('donhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
}
