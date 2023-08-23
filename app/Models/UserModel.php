<?php

namespace App\Models;

use App\Models\Base\UserBaseModel;

class UserModel extends UserBaseModel
{
  /**
   * Get user from DB by email
   * @param String $email
   * @return array 
   */
  public function getUserByEmail(String $email)
  {
    return $this->where('email', $email)->first();
  }
}
