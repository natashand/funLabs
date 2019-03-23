<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 05.03.2019
 * Time: 21:24
 */

namespace App\Http\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ];
    }
}