<?php

use Illuminate\Database\Seeder;

class vanchuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('2020-01-01 09:00:00');
        $list = [
            [
                'vc_id'       => 1,
                'vc_ten'      => "Miễn phí",
                'vc_chiphi'   => 0,
                'vc_thongtin' => "Nhận hàng trực tiếp tại cửa hàng.",
                'vc_ngaytaomoi'   => $today->format('Y-m-d H:i:s'),
                'vc_ngaycapnhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_id'       => 2,
                'vc_ten'      => "Miễn phí (trong vòng 24h)",
                'vc_chiphi'   => 0,
                'vc_thongtin' => "Chỉ áp dụng tại nội ô Tp. Cần Thơ và đơn hàng được nhận trước ngày gửi ít nhất là 2 ngày.",
                'vc_ngaytaomoi'   => $today->format('Y-m-d H:i:s'),
                'vc_ngaycapnhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_id'       => 3,
                'vc_ten'      => "Ưu tiên (trong vòng 8h)",
                'vc_chiphi'   => 30000,
                'vc_thongtin' => "Chỉ áp dụng tại nội ô Tp. Cần Thơ",
                'vc_ngaytaomoi'   => $today->format('Y-m-d H:i:s'),
                'vc_ngaycapnhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_id'       => 4,
                'vc_ten'      => "Miễn phí (vận chuyển thường)",
                'vc_chiphi'   => 0,
                'vc_thongtin' => "Áp dụng cho các tỉnh thành. Quý khách sẽ thanh toán phí vận chuyển của bưu điện.",
                'vc_ngaytaomoi'   => $today->format('Y-m-d H:i:s'),
                'vc_ngaycapnhat'  => $today->format('Y-m-d H:i:s')
            ], 
           
        ];
        DB::table('vanchuyen')->insert($list);
    }
    
}
