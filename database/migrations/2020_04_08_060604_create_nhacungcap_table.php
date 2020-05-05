<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->string('ncc_id',3)->primary();
            $table->string('ncc_ten', 50)->unique();
            $table->string('ncc_daidien', 50);
            $table->string('ncc_diachi', 100);
            $table->string('ncc_dienthoai', 11);
            $table->string('ncc_email', 50)->unique();
            $table->tinyInteger('ncc_trangthai')->default('2')->comment('1-khóa, 2-khả dụng');
            $table->string('xx_id',3);
            
            $table->unique(['ncc_ten', 'ncc_dienthoai', 'ncc_email']);
            $table->foreign('xx_id')->references('xx_id')->on('xuatxu')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
