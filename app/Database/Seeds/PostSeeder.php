<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Base\PostModel;
use Faker\Factory;

class PostSeeder extends Seeder 
{
  public function run()
  {
    $factory = new PostModel();
    $faker = Factory::create();
    for ($i=0; $i < 13; $i++) { 
      $data = [
        'title'       => $faker->word(),
        'description' => $faker->text(300),
        'user_id'     => 1,
        'image_url'   => 'https://picsum.photos/500/300'
      ];
      $factory->insert($data);
    }
  }
}
