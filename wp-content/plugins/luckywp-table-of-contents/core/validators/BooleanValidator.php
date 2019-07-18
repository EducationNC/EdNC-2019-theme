<?php

namespace luckywp\tableOfContents\core\validators;

class BooleanValidator extends Validator
{

    /**
     * @var mixed
     */
    public $trueValue = '1';

    /**
     * @var mixed
     */
    public $falseValue = '0';

    /**
     * @var bool
     */
    public $strict = false;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = __('{attribute} must be either "{true}" or "{false}".', 'luckywp-table-of-contents');
        }
    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->$attribute;

        if ($this->strict) {
            $valid = $value === $this->trueValue || $value === $this->falseValue;
        } else {
            $valid = $value == $this->trueValue || $value == $this->falseValue;
        }

        if ($valid) {
            return null;
        }

        return [
            $this->message,
            [
                '{true}' => $this->trueValue,
                '{false}' => $this->falseValue,
            ]
        ];
    }
}
