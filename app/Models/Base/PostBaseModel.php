<?php

namespace App\Models\Base;

use CodeIgniter\Model;

class PostBaseModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'posts';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = ['title', 'content', 'image_url', 'user_id', 'category', 'language'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // Validation
  protected $validationRules = [
    'title'     => 'required|max_length[50]',
    'content'   => 'required|max_length[5000]',
    'image_url' => 'required|max_length[300]',
    'category'  => 'required|numeric',
    'language'  => 'required|max_length[2]'
  ];
  protected $validationMessages = [
    'title' => [
      'required' => 'Errors.post_fields.title.required'
    ],
    'content' => [
      'required' => 'Errors.post_fields.content.required'
    ],
    'image_url' => [
      'required' => 'Errors.post_fields.image_url.required'
    ],
    'category' => [
      'required' => 'Errors.post_fields.category.required'
    ],
    'language' => [
      'required' => 'Errors.post_fields.language.required'
    ]
  ];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks = true;
  protected $beforeInsert   = [];
  protected $afterInsert    = [];
  protected $beforeUpdate   = [];
  protected $afterUpdate    = [];
  protected $beforeFind     = [];
  protected $afterFind      = [];
  protected $beforeDelete   = [];
  protected $afterDelete    = [];
}
