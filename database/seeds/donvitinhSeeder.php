<?php

use Illuminate\Database\Seeder;

class donvitinhSeeder extends Seeder
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
                'dvt_id' => "D01",
                'dvt_ten' => "Bộ", 
            ],
            [
                'dvt_id' => "D02",
                'dvt_ten' => "Cái", 
            ],
        ];  

        DB::table('donvitinh')->insert($list);
    }
}
