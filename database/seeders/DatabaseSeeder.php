<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Product::factory(50)->create();
    User::factory(50)->create();
    Company::factory(50)->create();
    Post::factory(20)->create();
  }
}
