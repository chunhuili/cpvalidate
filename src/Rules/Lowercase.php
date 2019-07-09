<?php

namespace Chunhuili\Cpvalidate\Rules;

use Chunhuili\Cpvalidate\Rule;

class Lowercase extends Rule
{

    /** @var string */
    protected $message = "The :attribute must be lowercase";

    /**
     * Check the $value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        return mb_strtolower($value, mb_detect_encoding($value)) === $value;
    }
}
