<?php

use Illuminate\Database\Seeder;

class sanphamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataLSP = DB::select('SELECT lsp_id From loaisanpham');  
        $today = new DateTime('2020-02-18 09:00:00');  
        $list=[
            [
                'sp_id' => "1",
                'sp_ten' => "Bộ bàn ăn Eames 4 ghế",
                'sp_giagoc' => '1750000',
                'sp_giaban' => '2100000',
                'sp_hinh' => "bg.jpg",
                'sp_thongtin' => 'LLLLLLLLLL',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0001',
                'dvt_id' => 'D01',
                'cl_id' => 'C01',
            ],
            [
                'sp_id' => "2",
                'sp_ten' => 'Tủ Malm nâu 2 ngăn kéo',
                'sp_giagoc' => '820000',
                'sp_giaban' => '1100000',
                'sp_hinh' => "tu2.jpg",
                'sp_thongtin' => 'AAAAAAAAAAA',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0002',
                'dvt_id' => 'D02',
                'cl_id' => 'C01',
            ],
            [
                'sp_id' => "3",
                'sp_ten' => 'Giường Malm đen',
                'sp_giagoc' => '3200000',
                'sp_giaban' => '3750000',
                'sp_hinh' => "gi.jpg",
                'sp_thongtin' => 'OOOOOOOOO',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0003',
                'dvt_id' => 'D02',
                'cl_id' => 'C01',
            ],
            [
                'sp_id' => "4",
                'sp_ten' => 'Bộ Sofa Landrona xám chân kim loại',
                'sp_giagoc' => '15000000',
                'sp_giaban' => '15450000',
                'sp_hinh' => "so.jpg",
                'sp_thongtin' => 'aaaaa',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0004',
                'dvt_id' => 'D01',
                'cl_id' => 'C04',
            ],
            [
                'sp_id' => "5",
                'sp_ten' => 'Bàn Mickie nâu đen',
                'sp_giagoc' => '1200000',
                'sp_giaban' => '1530000',
                'sp_hinh' => "ba.jpg",
                'sp_thongtin' => 'llllll',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0005',
                'dvt_id' => 'D02',
                'cl_id' => 'C01',
            ],
            [
                'sp_id' => "6",
                'sp_ten' => 'Ghế Pello kem',
                'sp_giagoc' => '450000',
                'sp_giaban' => '652000',
                'sp_hinh' => "gh.jpg",
                'sp_thongtin' => 'aaaaa',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0006',
                'dvt_id' => 'D02',
                'cl_id' => 'C04',
            ],
            [
                'sp_id' => "7",
                'sp_ten' => 'Đèn đứng Pello trắng',
                'sp_giagoc' => '210000',
                'sp_giaban' => '360000',
                'sp_hinh' => "tt.jpg",
                'sp_thongtin' => 'ppppp',
                'sp_ngaytaomoi' => $today->format('Y-m-d H:i:s'),
                'sp_ngaycapnhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangthai' => '2',
                'lsp_id' => 'L0007',
                'dvt_id' => 'D02',
                'cl_id' => 'C04',
            ],
        ];
        DB::table('sanpham')->insert($list);
    }
}
