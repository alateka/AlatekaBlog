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
        'constraint'     => 50
      ],
      'email' => [
        'type'           => 'TEXT',
        'constraint'     => 100
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
