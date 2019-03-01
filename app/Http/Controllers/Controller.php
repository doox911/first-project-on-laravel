<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // protected function formatValidationErrors(Validator $validator) {
    //
    //    return $validator->errors()->all();
    //
    // }
    //
    // public function messages() {
    //
    //     return [
    //         'title.required' => 'Необходимо указать заголовок',
    //         'body.required'  => 'Необходимо написать статью',
    //     ];
    // }
}
