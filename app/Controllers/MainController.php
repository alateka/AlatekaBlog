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
        'posts'      => strlen($categoryFilter) > 0 ? $postModel->where('category', $categoryFilter)->where('language', $this->globalData['locale'])->orderBy('created_at', 'desc')->paginate($perPage) : $postModel->where('language', $this->globalData['locale'])->orderBy('created_at', 'desc')->paginate($perPage),
        'pagination' => [
          'total'   => strlen($categoryFilter) > 0 ? $postModel->where('category', $categoryFilter)->where('language', $this->globalData['locale'])->countAllResults() : $postModel->where('language', $this->globalData['locale'])->countAllResults(),
          'page'    => $_GET['page'] ?? 1,
          'pager'   => $postModel->pager,
          'perPage' => $perPage
        ]
      ]
    ]);
  }
}