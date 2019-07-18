<?php

namespace luckywp\tableOfContents\plugin\contentHandling;

class ContentHandlingDto
{

    /**
     * @var string
     */
    public $content;

    /**
     * @var bool
     */
    public $modify = false;

    /**
     * @var string
     */
    public $skipText = '';

    /**
     * @var array
     */
    public $skipLevels = [];

    /**
     * @var string
     */
    public $hashFormat = 'asheading';
}
