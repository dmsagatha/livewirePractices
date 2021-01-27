<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CustomisedModal extends Component
{
  public $title = '';
  public $id = '';      // Capturar el id

  public function __construct($title, $id = '')
  {
    $this->title = $title;
    $this->id = $id;
  }

  public function getModelIdString(): string
  {
    if ($this->id != '') {
      return $this->id;
    }

    return 'model' . rand(1111, 9999);
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|string
   */
  public function render()
  {
    return view('components.customised-modal');
  }
}
