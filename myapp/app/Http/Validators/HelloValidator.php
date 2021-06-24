<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    public function validateHello ($attribute, $value, $paramaters)
    {
        $value = intval($value);
        return $value % 2 === 0;
    }
}