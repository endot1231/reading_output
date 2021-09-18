<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OutPut;
use Faker\Factory as Faker;
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
        //必要ならループ（ここをFactory使う）
        for($i = 0; $i < 10; $i++){
            OutPut::create([
                'user_id' => 33,
                'title' => Str::random(100),
                'content' =>  Str::random(100),
                'is_draft' =>false, 
            ]);
        }
    }
}
