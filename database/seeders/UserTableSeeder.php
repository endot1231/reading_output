<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
            'comment' => 'ここに自己紹介が入ります。' ,
            'profile_id' => 1
        ]); 
    }
}
