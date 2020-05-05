<?php

use Illuminate\Database\Seeder;

class chatlieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = []; 
        
        $list = [
            [
                'cl_id' => "C01",
                'cl_ten' => "Gỗ", 
            ],
            [
                'cl_id' => "C02",
                'cl_ten' => "Nhựa", 
            ],
            [
                'cl_id' => "C03",
                'cl_ten' => "Đá", 
            ],
            [
                'cl_id' => "C04",
                'cl_ten' => "Kim loại", 
            ],
            [
                'cl_id' => "C05",
                'cl_ten' => "Da", 
            ],
            [
                'cl_id' => "C06",
                'cl_ten' => "Mây tre", 
            ]
        ];  

        DB::table('chatlieu')->insert($list);
    }
}
