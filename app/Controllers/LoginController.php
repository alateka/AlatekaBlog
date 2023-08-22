<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
      return view('pages/login', [
        'globalData' => $this->globalData
      ]);
    }
}
