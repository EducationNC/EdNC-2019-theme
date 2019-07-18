<?php

namespace luckywp\tableOfContents\core\validators;

class RequiredValidator extends Validator
{
    /**
     * @var bool
     */
    public $skipOnEmpty = false;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = __('{attribute} cannot be blank.', 'luckywp-table-of-contents');
        }
    }

    /**
     * @param mixed $value
     * @return array|null
     */
    protected function validateValue($value)
    {
        if (!$this->isEmpty(is_string($value) ? trim($value) : $value)) {
            return null;
        }
        return [$this->message, []];
    }
}
