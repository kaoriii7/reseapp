<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => 'イタリアン',
          'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
        ];
        DB::table('genres')->insert($param);
        $param = [
          'name' => 'ラーメン',
          'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
        ];
        DB::table('genres')->insert($param);
        $param = [
          'name' => '居酒屋',
          'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
        ];
        DB::table('genres')->insert($param);
        $param = [
          'name' => '寿司',
          'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
        ];
        DB::table('genres')->insert($param);
        $param = [
          'name' => '焼肉',
          'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
        ];
        DB::table('genres')->insert($param);
    }
}
