<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      User::create([
            'name' => 'admin',
            'email' => 'admin@xhit.io',
            'password' => bcrypt('123456'),
      ]);
      //add role authenticated for user just registered
      $user = User::where('name', '=', 'admin')->first();
      $role = Role::where('name', 'administrator')->first();
      $user->roles()->attach($role->id);

      User::create([
            'name' => 'printer',
            'email' => 'printer@xhit.io',
            'password' => bcrypt('123456'),
      ]);
      //add role authenticated for user just registered
      $user = User::where('name', '=', 'printer')->first();
      $role = Role::where('name', 'printer')->first();
      $user->roles()->attach($role->id);

      User::create([
            'name' => 'designer',
            'email' => 'designer@xhit.io',
            'password' => bcrypt('123456'),
      ]);
      //add role authenticated for user just registered
      $user = User::where('name', '=', 'designer')->first();
      $role = Role::where('name', 'designer')->first();
      $user->roles()->attach($role->id);

    }
}
