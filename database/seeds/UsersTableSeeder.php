<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //初期ユーザー
        DB::table('users')->insert([
            [
                'username' => 'User1',
                'mail' => 'first@gmail.com',
                'password' => bcrypt('firstuser')
            ]
        ]);
    }
}
