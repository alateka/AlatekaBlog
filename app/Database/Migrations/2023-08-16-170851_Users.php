<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'auto_increment' => true
      ],
      'username' => [
        'type'           => 'TEXT',
        'constraint'     => 50,
        'null'           => false
      ],
      'name' => [
        'type'           => 'TEXT',
        'constraint'     => 50,
        'null'           => true
      ],
      'last_name' => [
        'type'           => 'TEXT',
        'constraint'     => 50,
        'null'           => true
      ],
      'password' => [
        'type'           => 'TEXT',
        'constraint'     => 100,
        'null'           => false
      ],
      'email' => [
        'type'           => 'TEXT',
        'constraint'     => 100,
        'null'           => false
      ],
      'profile_image_url' => [
        'type'           => 'TEXT',
        'constraint'     => 300,
        'null'           => true
      ],
      'updated_at' => [
        'type'           => 'DATETIME',
        'constraint'     => 11,
        'null'           => true
      ],
      'created_at' => [
        'type'           => 'DATETIME',
        'constraint'     => 11,
        'null'           => false
      ]
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
  }

  public function down()
  {
    $this->forge->dropTable('users');
  }
}
