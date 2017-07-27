<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PermissionRequest extends FormRequest
{
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|unique:permissions,name,'.$this->get('name'),
    ];
  }

}