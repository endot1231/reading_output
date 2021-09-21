<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OutPut;
use Faker\Factory;
use Illuminate\Support\Str;

class OutPutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP');
        //必要ならループ（ここをFactory使う）
        for($i = 0; $i < 10; $i++){
            OutPut::create([
                'user_id' => 1,
                'title' => "テストタイトル".$i,
                'content' =>  $faker->realText(),
                'is_draft' =>false, 
            ]);
        }
    }
}
