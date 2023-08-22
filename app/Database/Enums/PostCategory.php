<?php

namespace App\Database\Enums;

enum PostCategory: int {
  case LINUX = 1;
  case WINDOWS = 2;
  case SOFTWARE = 3;
  case HARDWARE = 4;
  case DEVELOPMENT = 5;
}
