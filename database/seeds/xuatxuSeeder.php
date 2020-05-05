<?php

use Illuminate\Database\Seeder;

class xuatxuSeeder extends Seeder
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
                'xx_id' => "X01",
                'xx_ten' => "Việt Nam", 
                'xx_trangthai' => '2', 
            ],
            [
                'xx_id' => "X02",
                'xx_ten' => "Trung Quốc", 
                'xx_trangthai' => '2', 
            ],
            [
                'xx_id' => "X03",
                'xx_ten' => "Đức", 
                'xx_trangthai' => '2', 
            ],[
                'xx_id' => "X04",
                'xx_ten' => "Mỹ", 
                'xx_trangthai' => '2', 
            ],[
                'xx_id' => "X05",
                'xx_ten' => "Ý", 
                'xx_trangthai' => '2', 
            ],
           
        ];  

        DB::table('xuatxu')->insert($list);
    }
}
