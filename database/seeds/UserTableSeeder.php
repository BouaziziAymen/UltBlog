<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
DB::table('users')->insert([
[
'name' => 'Ahmed',
'email' => str_random(12).'@email.com',
'password' => bcrypt('yourPassword'),
'created_at' => new DateTime,
'updated_at' => new DateTime,
],
[
'name' => 'Ali',
'email' => str_random(12).'@email.com',
'password' => bcrypt('yourPassword'),
'created_at' => new DateTime,
'updated_at' => new DateTime,
],
[
'name' => 'Manel',
'email' => str_random(12).'@email.com',
'password' => bcrypt('yourPassword'),
'created_at' => new DateTime,
'updated_at' => new DateTime,
],
]);
}
}
