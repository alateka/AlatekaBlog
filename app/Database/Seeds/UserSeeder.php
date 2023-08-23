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
      'username'  => 'admin',
      'email'     => 'admin@email.es',
      'name'      => $faker->name('male'),
      'last_name' => $faker->lastName(),
      'password'  => password_hash('admin', PASSWORD_BCRYPT)
    ];
    $factory->insert($data);
  }
}
