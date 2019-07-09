<?php

namespace Chunhuili\Cpvalidate\Rules;

use Chunhuili\Cpvalidate\Rule;

class RequiredWithoutAll extends Required
{
    /** @var bool */
    protected $implicit = true;

    /** @var string */
    protected $message = "The :attribute is required";

    /**
     * Given $params and assign $this->params
     *
     * @param array $params
     * @return self
     */
    public function fillParameters(array $params): Rule
    {
        $this->params['fields'] = $params;
        return $this;
    }

    /**
     * Check the $value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        $this->requireParameters(['fields']);
        $fields = $this->parameter('fields');
        $validator = $this->Cpvalidate->getValidator();
        $requiredValidator = $validator('required');

        foreach ($fields as $field) {
            if ($this->Cpvalidate->hasValue($field)) {
                return true;
            }
        }

        $this->setAttributeAsRequired();
        return $requiredValidator->check($value, []);
    }
}
