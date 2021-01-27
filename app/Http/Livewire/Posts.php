<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
  use WithPagination;

  protected $paginationTheme = 'bootstrap';
  public $perPage = 10;

  public $title;
  public $content;

  /* public function hydrate()
  {
      $this->validate([
        'title' => 'required|min:10|max:20', //|unique:posts',
        'content' => 'required',
      ]);
  } */

  public function save()
  {
    $validateData = [
      'title' => 'required|min:10|max:20|unique:posts',
      'content' => 'required',
    ];

    $data = [
      'title' => $this->title,
      'content' => $this->content,
    ];

    $this->validate($validateData);
    
    Post::create($data);
    $this->cleanVars();
    session()->flash('success', 'Content Created Successfully.');
  }

  private function cleanVars()
  {
    $this->title = null;
    $this->content = null;
  }

  public function render()
  {
    return view('posts.posts', [
      'posts' => Post::orderBy('title')->paginate($this->perPage)
    ]);
  }
}
