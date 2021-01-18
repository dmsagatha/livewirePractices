<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ExampleTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  function users_table_is_searchable()
  {
    User::factory()->create(['name' => 'foo']);
    User::factory()->create(['name' => 'bar']);

    Livewire::test('users-table')
        ->assertSee('foo')
        ->assertSee('bar')
        ->set('search', 'foo')
        ->assertSee('foo')
        ->assertDontSee('bar');
  }
}
