<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class RoleRequest extends FormRequest
{
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|string|unique:roles,name,'.$this->segment(4).',id',
    ];
  }

}
