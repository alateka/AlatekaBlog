<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class BlogController extends BaseController
{

  public function index(): string
  {
    $postModel = new PostModel();

    return view('main', [
      'globalData' => $this->globalData,
      'posts'      => $postModel->findAll()
    ]);
  }
}