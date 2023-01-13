<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\InvokableRule;

class CheckCorrectPassword implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!(Hash::check($value, Auth::user()->password))) {
            $fail('The :attribute dont match.');
        }
    }
}
