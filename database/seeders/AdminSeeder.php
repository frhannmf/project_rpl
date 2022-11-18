<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'email' => 'admin@silani.com',
      'password' => Hash::make('12345Tes'),
      'name' => 'Admin',
      'nim' => '000000',
      'role' => 'ADMIN',
    ]);
  }
}
