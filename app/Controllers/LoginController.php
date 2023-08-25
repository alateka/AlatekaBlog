<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
  public function index()
  {
    if( session('user') )
      return redirect('dashboard');
    
    return view('pages/login', [
      'globalData' => $this->globalData
    ]);
  }

  public function login()
  {
    // -----------
    // VALIDATIONS
    // -----------

    // Check if is via post
    if ( !$this->request->is('post') )
      return $this->response->setStatusCode(405)->setBody(lang('Base.method_not_allowed'));

    // Validations
    if ( !$this->validate([
        'email'    => 'required|valid_email',
        'password' => 'required'
      ])
    ) return redirect()->back()->withInput();

    
    // ----------
    // CHECK USER
    // ----------

    // Load user model
    $userModel = new UserModel();

    // Find user on DB
    $user = $userModel->getUserByEmail( $this->request->getVar('email'));
    if ( !$user )
      return redirect()->back()->withInput()->with('error', lang('Login.credentials_not_found'));

    // Check password
    if ( !password_verify($this->request->getVar('password'), $user['password']) )
      return redirect()->back()->withInput()->with('error', lang('Login.credentials_not_found'));

    
    // Set session
    session()->set([
      'user' => [
        'username' => $user['username'],
        'email' => $user['email']
      ]
    ]);

    // Redirect dashboard page
    return redirect('dashboard');
  }


  public function logout()
  {
    session()->destroy();
    return redirect('home');
  }
}
