<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'user_id' => 1,
          'shop_id' => 1,
        ];
        DB::table('likes')->insert($param);
        $param = [
          'user_id' => 1,
          'shop_id' => 8,
        ];
        DB::table('likes')->insert($param);
        $param = [
          'user_id' => 1,
          'shop_id' => 15,
        ];
        DB::table('likes')->insert($param);
    }
}
