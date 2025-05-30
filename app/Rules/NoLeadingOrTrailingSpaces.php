<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoLeadingOrTrailingSpaces implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value !== trim($value)) {
            $fail("Trường $attribute không được chứa khoảng trắng ở đầu hoặc cuối.");
        }
    }
}
