<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $admin = new User();
      $admin->name = 'Admin';
      $admin->email = 'admin@baldore.com';
      $admin->password = bcrypt('password');
      $admin->save();
    }
}
