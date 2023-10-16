<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => Str::uuid(), 'name' => '田中 太郎', 'email' => 'test@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '鈴木 次郎', 'email' => 'suzuki@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '佐藤 三郎', 'email' => 'sato@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '高橋 四郎', 'email' => 'takahashi@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '小林 五郎', 'email' => 'kobayashi@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '吉田 六郎', 'email' => 'yoshida@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '伊藤 七郎', 'email' => 'ito@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '渡辺 八郎', 'email' => 'watanabe@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '加藤 九郎', 'email' => 'kato@example.com', 'password' => Hash::make('password')],
            ['id' => Str::uuid(), 'name' => '山田 十郎', 'email' => 'yamada@example.com', 'password' => Hash::make('password')],
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
