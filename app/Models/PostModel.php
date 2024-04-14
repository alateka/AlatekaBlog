<?php

namespace App\Models;

use App\Database\Enums\PostCategory;
use App\Models\Base\PostBaseModel;

class PostModel extends PostBaseModel
{
  /** Get all the translated categories to use on a dropdown
   * @return array Categories array
   */
  public function getPostCategories(): array
  {
    $categories = [];
    foreach ( array_column(PostCategory::cases(), 'value') as $value) {

      switch ($value) {
        case PostCategory::LINUX->value:
          $categories[PostCategory::LINUX->value] = 'Linux';
          break;
        
        case PostCategory::WINDOWS->value:
          $categories[PostCategory::WINDOWS->value] = 'Windows';
          break;
      
        case PostCategory::SOFTWARE->value:
          $categories[PostCategory::SOFTWARE->value] = 'Software';
          break;

        case PostCategory::HARDWARE->value:
          $categories[PostCategory::HARDWARE->value] = 'Hardware';
          break;

        case PostCategory::DEVELOPMENT->value:
          $categories[PostCategory::DEVELOPMENT->value] = lang('Navbar.development');
          break;

        default:
          break;
      }
    }
    return $categories;
  }
}
