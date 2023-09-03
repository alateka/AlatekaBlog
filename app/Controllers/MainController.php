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
    $posts = [];
    $postsCounter = 0;

    if( $this->request->getVar('category') ) {
      $posts = $postModel
        ->where('category', $this->request->getVar('category'))
        ->where('language', $this->globalData['locale'])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
        
      $postsCounter = $postModel
        ->where('category', $this->request->getVar('category'))
        ->where('language', $this->globalData['locale'])
        ->countAllResults();

    } else {
      $posts = $postModel
        ->where('language', $this->globalData['locale'])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
      
      $postsCounter = $postModel
        ->where('language', $this->globalData['locale'])
        ->countAllResults();
    }

    return view('main', [
      'globalData' => $this->globalData,
      'data'      => [
        'posts'      => $posts,
        'pagination' => [
          'total'   => $postsCounter,
          'page'    => $_GET['page'] ?? 1,
          'pager'   => $postModel->pager,
          'perPage' => $perPage
        ]
      ]
    ]);
  }
}