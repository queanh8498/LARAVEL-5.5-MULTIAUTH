<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('dh_id');
            $table->string('kh_email');
            $table->unsignedBigInteger('kh_id');
            $table->dateTime('dh_thoigiandathang')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('dh_thoigiannhanhang');
            $table->string('dh_diachi', 250);
            $table->string('dh_dienthoai', 11);
            $table->unsignedTinyInteger('dh_dathanhtoan')->default('0')->comment('Đã thanh toán tiền');
            //$table->unsignedTinyInteger('nguoigiaohang')->default('1')->comment('1-chưa phân công');
            $table->dateTime('dh_ngaylapphieugiao')->nullable()->default(NULL);
            $table->dateTime('dh_ngaygiaohang')->nullable()->default(NULL)->comment('Thời điểm khách nhận được hàng');
            $table->timestamp('dh_ngaytaomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('dh_ngaycapnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('dh_trangthai')->default('1')->comment('1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy');
            $table->unsignedTinyInteger('vc_id');
            $table->unsignedTinyInteger('tt_id');
            
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            //$table->foreign('kh_email')->references('kh_email')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            //$table->foreign('nd_giaohang')->references('nd_id')->on('nguoidung')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_id')->references('tt_id')->on('thanhtoan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('vc_id')->references('vc_id')->on('vanchuyen')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
