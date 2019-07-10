<?php
/**
 * Created by PhpStorm.
 * User: lichunhui
 * Date: 2019/7/10
 * Time: 上午9:14
 */

namespace Chunhuili\Cpvalidate\Rules;

use Chunhuili\Cpvalidate\Rule;

class Sensitive extends Rule
{
    /** @var string */
    protected $message = "this is Sensitive word";

    /**
     * Check the $value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        $sensitiveWord = ['hhh','aaa'];

        if (in_array($value,$sensitiveWord)) {
            return false;
        }

        return true;
    }
}