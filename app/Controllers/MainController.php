<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class MainController extends BaseController
{

  public function index(): string
  {
    $postModel = new PostModel();
    $perPage = 12;

    $categoryFilter = '';
    if( $this->request->getVar('category') ){
       $categoryFilter = $this->request->getVar('category');
    }

    return view('main', [
      'globalData' => $this->globalData,
      'data'      => [
        'posts'      => strlen($categoryFilter) > 0 ? $postModel->where('category', $categoryFilter)->paginate($perPage) : $postModel->paginate($perPage),
        'pagination' => [
          'total'   => $postModel->countAll(),
          'page'    => $_GET['page'] ?? 1,
          'pager'   => $postModel->pager,
          'perPage' => $perPage
        ]
      ]
    ]);
  }
}