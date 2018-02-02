<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=4; $i < 30; $i++) {
        DB::table('orders')->insert([
            'user_id' => $i,
            'slot_1_orders' => rand(0,20),
            'slot_2_orders' => rand(0,20),
            'slot_3_orders' => rand(0,20),
            'slot_4_orders' => rand(0,20),
            'slot_5_orders' => rand(0,20),
        ]);
      }

    }
}
