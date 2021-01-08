<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderStoreRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'order_number' => [
        'required',
        Rule::unique('orders')->ignore($this->order)
      ],
      'customer_name' => 'required',
      'customer_email' => 'required',
    ];
  }
}
