<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
  use WithPagination;

  public $title;
  public $content;
  public $modelId;

  public function render()
  {
    return view('posts.posts', [
      'posts' => Post::orderBy('title')->paginate(5)
    ]);
  }

  public function save()
  {
    // Data validation
    $validateData = [
      'title' => 'required|min:10|max:20|unique:posts',
      'content' => 'required',
    ];

    // Default data
    $data = [
      'title' => $this->title,
      'content' => $this->content,
    ];

    $this->validate($validateData);

    if ($this->modelId) {
      Post::find($this->modelId)->update($data);
      $postInstanceId = $this->modelId;
    } else {
      $postInstance = Post::create($data);
      $postInstanceId = $postInstance->id;
    }

    $this->emit('refreshParent');
    $this->dispatchBrowserEvent('closeModal');
    $this->cleanVars();
  }

  public function forcedCloseModal()
  {
    // Resetear las variables públicas
    $this->cleanVars();

    // Restablecerán los bags de errores
    $this->resetErrorBag();
    $this->resetValidation();
  }

  private function cleanVars()
  {
    $this->modelId = null;
    $this->title = null;
    $this->content = null;
  }
}
