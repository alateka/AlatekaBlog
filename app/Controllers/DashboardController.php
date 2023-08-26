<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class DashboardController extends BaseController
{
    public function index()
    {
      if( session('user') ) {
        $postsCounter = new PostModel();

        return view('pages/dashboard', [
          'globalData'    => $this->globalData,
          'postsCounter' => $postsCounter->countAll()
        ]);
      }
    
      return redirect('login');
    }
}
