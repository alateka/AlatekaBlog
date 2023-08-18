<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'auto_increment' => true
      ],
      'title' => [
        'type'           => 'TEXT',
        'constraint'     => 50,
        'null'           => false
      ],
      'description' => [
        'type'           => 'TEXT',
        'constraint'     => 1000,
        'null'           => false
      ],
      'image_url' => [
        'type'           => 'TEXT',
        'constraint'     => 300,
        'null'           => true
      ],
      'user_id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'null'           => false
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
    $this->forge->addForeignKey('user_id', 'users', 'id');
    $this->forge->createTable('posts');
  }

  public function down()
  {
    $this->forge->dropTable('posts');
  }
}
