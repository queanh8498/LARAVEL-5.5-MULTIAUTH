<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->string('lsp_id',5)->comment('Mã loại sản phẩm');
            $table->string('lsp_ten', 30)->comment('Tên loại sản phẩm');
            $table->timestamp('lsp_ngaytaomoi')->nullable()->comment('Time tạo loại sản phẩm');
            $table->unsignedTinyInteger('lsp_trangthai')->default('2')->comment('Trạng thái:1-khóa, 2-khả dụng');

            $table->primary(['lsp_id']);
            $table->unique(['lsp_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaisanpham');
    }
}
