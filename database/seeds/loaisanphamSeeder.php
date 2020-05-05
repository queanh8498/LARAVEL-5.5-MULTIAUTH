<?php

use Illuminate\Database\Seeder;

class loaisanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = []; //create list chuwas data 
        
        $today = new DateTime('2020-01-01 08:00:00');
        //create list chuwas data
        $list = [
            [
                'lsp_id' => "L0001",
                'lsp_ten' => "Bàn ghế",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            [
                'lsp_id' => "L0002",
                'lsp_ten' => "Tủ",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            [
                'lsp_id' => "L0003",
                'lsp_ten' => "Giường ngủ",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            [
                'lsp_id' => "L0004",
                'lsp_ten' => "Sofa",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            
            [
                'lsp_id' => "L0005",
                'lsp_ten' => "Bàn đơn",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            [
                'lsp_id' => "L0006",
                'lsp_ten' => "Ghế đơn",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
            [
                'lsp_id' => "L0007",
                'lsp_ten' => "Đồ trang trí",
                'lsp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'lsp_trangthai' => '2',
            ],
           
        ];  
        DB::table('loaisanpham')->insert($list); //goi lenh insert
    }
}
