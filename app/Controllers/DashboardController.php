<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
      if( session('user') )
        return view('pages/dashboard', [
          'globalData' => $this->globalData
        ]);
    
      return redirect('login');
    }
}
