<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->unsignedBigInteger('sp_id')->autoIncrement();
            $table->string('sp_ten',100)->unique();
            $table->unsignedInteger('sp_giagoc')->default('0');
            $table->unsignedInteger('sp_giaban')->default('0');
            $table->string('sp_hinh',100);
            $table->text('sp_thongtin');
            $table->timestamp('sp_ngaytaomoi')->nullable();
            $table->timestamp('sp_ngaycapnhat')->nullable();
            $table->tinyInteger('sp_trangthai')->default('2')->comment('Trạng thái:1, 2');
            $table->string('lsp_id',5);
            $table->string('dvt_id',3);
            $table->string('cl_id',3);


            $table->foreign('lsp_id')->references('lsp_id')->on('loaisanpham') 
                                ->onDelete('CASCADE')
                                ->onUpdate('CASCADE');
            $table->foreign('dvt_id')->references('dvt_id')->on('donvitinh') 
                                ->onDelete('CASCADE')
                                ->onUpdate('CASCADE');
            $table->foreign('cl_id')->references('cl_id')->on('chatlieu') 
                                ->onDelete('CASCADE')
                                ->onUpdate('CASCADE');
                                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
