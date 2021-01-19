<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Product::factory(10)->create();
    User::factory(70)->create();

    DB::table('companies')->insert([
      ['title' => 'Empresa 1'],
      ['title' => 'Empresa 2'],
      ['title' => 'Empresa 3'],
      ['title' => 'Empresa 4'],
      ['title' => 'Empresa 5'],
      ['title' => 'Empresa 6'],
      ['title' => 'Empresa 7'],
      ['title' => 'Empresa 8'],
    ]);
  }
}
