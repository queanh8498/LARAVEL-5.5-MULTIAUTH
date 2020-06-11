<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->unsignedBigInteger('kh_id')->autoIncrement();
            //$table->string('kh_taikhoan');
            //$table->string('kh_matkhau');
            $table->string('kh_email');
            $table->string('kh_hoten');
            $table->unsignedTinyInteger('kh_gioitinh')->default('1')->comment('giới tính 1: Nam; 2: nữ, 3: Khác');
            $table->string('kh_diachi');
            $table->string('kh_dienthoai');
            $table->timestamp('kh_ngaytaomoi')->nullable();
            $table->unsignedTinyInteger('kh_trangthai')->default('1')->comment('Trạng thái 1: Khả dụng; 2: Xóa-ed');
            
           // $table->primary(['kh_email']);
           // $table->unique([ 'kh_dienthoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
