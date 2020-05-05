<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class thanhtoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('2019-11-27 09:00:00');
        $list=[];

        array_push($list, [
            'tt_id' => '1',
            'tt_ten' => 'Thanh toán khi nhận hàng',
            'tt_thongtin' => 'Bạn hãy thanh toán khi nhận hàng',
            'tt_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
            'tt_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
            'tt_trangthai' => '2'
        ]);
        array_push($list, [
            'tt_id' => '2',
            'tt_ten' => 'Paypal',
            'tt_thongtin' => 'Bạn hãy thanh toán qua Paypal',
            'tt_ngaytaomoi' =>  $today->format('Y-m-d H:i:s'),
            'tt_ngaycapnhat' =>  $today->format('Y-m-d H:i:s'),
            'tt_trangthai' => '2'
        ]);
        array_push($list, [
            'tt_id' => '3',
            'tt_ten' => 'ATM',
            'tt_thongtin' => 'Bạn hãy thanh toán qua thẻ ATM',
            'tt_ngaytaomoi' =>  $today->format('Y-m-d H:i:s'),
            'tt_ngaycapnhat' =>  $today->format('Y-m-d H:i:s'),
            'tt_trangthai' => '2'
        ]);
        DB::table('thanhtoan')->insert($list);
    }
}
