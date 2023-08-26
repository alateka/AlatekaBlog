<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class PostController extends BaseController
{
  public function index()
  {
    return view('pages/posts/create_post', [
      'globalData' => $this->globalData
    ]);
  }

  public function store()
  {
    // Check if is via post
    if ( !$this->request->is('post') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    // Validations
    if ( !$this->validate([
        'title'    => 'required|max_length[50]',
        'content' => 'required|max_length[1000]',
        'image_url' => 'required|max_length[300]',
        'category' => 'required|numeric'
      ])
    ) return redirect()->back()->withInput();

    // Save post on DB
    $post = new PostModel();
    $post->insert([
      'title'     => $this->request->getVar('title'),
      'content'   => $this->request->getVar('content'),
      'user_id'   => session('user')['id'],
      'image_url' => $this->request->getVar('image_url'),
      'category'  => $this->request->getVar('category')
    ]);

    // Redirect dashboard page
    return redirect('dashboard');
  }

  public function show(int $id)
  {
    $post = new PostModel();

    return view('pages/posts/show_post', [
      'globalData' => $this->globalData,
      'postData'   => $post->find($id)
    ]);
  }
}
