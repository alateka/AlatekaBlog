<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use Faker\Factory;

class UserSeeder extends Seeder
{
  public function run()
  {
    $factory = new UserModel();
    $faker = Factory::create();

    $data = [
      'username'  => 'alateka',
      'email'     => 'alateka@email.es',
      'name'      => $faker->name('male'),
      'last_name' => $faker->lastName()
    ];
    $factory->insert($data);
  }
}
