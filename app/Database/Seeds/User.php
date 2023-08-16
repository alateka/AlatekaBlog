<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
  public function run()
  {
    $this->db->table('users')->insertBatch([
      'username'  => 'alateka',
      'email'     => 'alateka@email.es'
    ]);
  }
}
