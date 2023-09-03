<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class PostController extends BaseController
{
  public function create()
  {
    // Check if is via get
    if ( !$this->request->is('get') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    return view('pages/posts/create_edit_post', [
      'globalData' => $this->globalData,
      'isEditing'  => false
    ]);
  }

  public function store()
  {
    // Check if is via post
    if ( !$this->request->is('post') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    // Check validations from model & save post on DB
    $post = new PostModel();
    $isOK = $post->insert([
      'title'     => $this->request->getVar('title'),
      'content'   => $this->request->getVar('content'),
      'user_id'   => session('user')['id'],
      'image_url' => $this->request->getVar('image_url'),
      'category'  => $this->request->getVar('category'),
      'language'  => $this->request->getVar('language')
    ]);

    // Redirect back if there are errors
    if ( $isOK === false )
      return redirect()
      ->back()
      ->withInput()
      ->with('errors', $post->errors()); 

    // Redirect dashboard page if all is OK
    return redirect('dashboard');
  }

  public function show(int $id)
  {
    // Check if is via get
    if ( !$this->request->is('get') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    $post = new PostModel();

    return view('pages/posts/show_post', [
      'globalData' => $this->globalData,
      'postData'   => $post->find($id)
    ]);
  }

  public function edit(int $id)
  {
    // Check if is via put
    if ( !$this->request->is('get') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    $post = new PostModel();

    return view('pages/posts/create_edit_post', [
      'globalData' => $this->globalData,
      'postData'   => $post->find($id),
      'isEditing'  => true
    ]);
  }

  public function update(int $id)
  {
    // Check if is via put
    if ( !$this->request->is('put') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    $post = new PostModel();

    $isOK = $post->update($id, [
      'title'     => $this->request->getVar('title'),
      'content'   => $this->request->getVar('content'),
      'image_url' => $this->request->getVar('image_url'),
      'category'  => $this->request->getVar('category'),
      'language'  => $this->request->getVar('language')
    ]);

    // Redirect back if there are errors
    if ( $isOK === false )
      return redirect()
      ->back()
      ->withInput()
      ->with('errors', $post->errors()); 

    // Redirect dashboard page if all is OK
    return redirect('dashboard');
  }

  public function delete(int $id)
  {
    // Check if is via delete
    if ( !$this->request->is('delete') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    $post = new PostModel();


    if ( $post->delete($id) )
      return redirect('home')
        ->with('ok_message', lang('Post.ok_post_deleted')
    );
    else
      return redirect('home')
        ->with('error_message', lang('Errors.post_actions.delete')
      );
  }
}
