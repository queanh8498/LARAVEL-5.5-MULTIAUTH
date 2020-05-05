<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('vc_id')->autoIncrement();
            $table->string('vc_ten');
            $table->unsignedInteger('vc_chiphi')->default('0')->comment('Phí giao hàng');
            $table->text('vc_thongtin')->comment('Thông tin dịch vụ giao hàng');
            $table->timestamp('vc_ngaytaomoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('vc_ngaycapnhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('vc_trangthai')->default('2')->comment('1-khóa, 2-hiển thị');
            
            $table->unique(['vc_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vanchuyen');
    }
}
