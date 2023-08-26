<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class MainController extends BaseController
{

  public function index(): string
  {
    $postModel = new PostModel();
    $posts['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
    $posts['perPage'] = 12;
    $posts['total'] = $postModel->countAll();
    $posts['data'] = $postModel->paginate($posts['perPage']);
    $posts['pager'] = $postModel->pager;

    return view('main', [
      'globalData' => $this->globalData,
      'posts'      => $posts
    ]);
  }
}