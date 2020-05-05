<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //thứ tự chạy seeder
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(thanhtoanSeeder::class);
        $this->call(vanchuyenSeeder::class);
         $this->call(donvitinhSeeder::class);
         $this->call(chatlieuSeeder::class);
         $this->call(loaisanphamSeeder::class);
         $this->call(sanphamSeeder::class);
         //$this->call(hinhanhSeeder::class);
         $this->call(xuatxuSeeder::class);
         //$this->call(nhacungcapSeeder::class);
         
         // supposed to only apply to a single connection and reset it's self
		// but I like to explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
