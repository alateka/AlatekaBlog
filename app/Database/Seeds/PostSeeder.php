<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PostModel;
use Faker\Factory;

class PostSeeder extends Seeder 
{
  public function run()
  {
    $factory = new PostModel();
    $faker = Factory::create();

    for ($i=0; $i < 155; $i++) {
      $data = [
        'title'     => $faker->word(),
        'content'   => $faker->text(500),
        'user_id'   => 1,
        'image_url' => 'https://picsum.photos/500/300',
        'category'  => random_int(1, 5),
        'language'  => random_int(1, 2) === 1 ? 'es' : 'en' 
      ];
      $factory->insert($data);
    }

  }
}
