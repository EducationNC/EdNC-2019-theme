<?php

namespace luckywp\tableOfContents\plugin\contentHandling;

use luckywp\tableOfContents\core\Core;
use luckywp\tableOfContents\core\helpers\Html;

class ContentHandling
{

    /**
     * @param ContentHandlingDto $dto
     * @return ContentHandlingResult
     */
    public static function go($dto)
    {
        $result = new ContentHandlingResult();
        $result->content = $dto->content;

        $skipRegex = Core::$plugin->skipHeadingTextToRegex($dto->skipText);

        static::$headingIdCounter = 0;
        static::$headingIds = [];
        $result->content = preg_replace_callback('#<h([1-6])(.*?)>(.*?)</h\d>#imsu', function ($m) use ($dto, $result, $skipRegex) {
            $label = trim(strip_tags($m[3]));
            $headingId = static::makeHeadingId($label, $dto->hashFormat);
            $headingIndex = (int)$m[1];

            $result->headings[] = [
                'id' => $headingId,
                'index' => $headingIndex,
                'label' => $label,
            ];

            if (!$dto->modify ||
                in_array('h' . $headingIndex, $dto->skipLevels) ||
                ($skipRegex && preg_match($skipRegex, $label))
            ) {
                return $m[0];
            }

            return '<h' . $headingIndex . $m[2] . '>' . Html::tag('span', $m[3], ['id' => $headingId]) . '</h' . $headingIndex . '>';
        }, $dto->content);

        return $result;
    }

    /**
     * @var int
     */
    protected static $headingIdCounter;

    /**
     * @var string[]
     */
    protected static $headingIds;

    /**
     * @param string $label
     * @param string $hashFormat
     * @return string
     */
    protected static function makeHeadingId($label, $hashFormat)
    {
        switch ($hashFormat) {
            case 'counter':
                $id = 'lwptoc' . ++static::$headingIdCounter;
                break;

            case 'asheading':
            case 'asheadingwotransliterate':
            default:
                $id = html_entity_decode($label, ENT_QUOTES, get_option('blog_charset'));
                if ($hashFormat == 'asheadingwotransliterate') {
                    $id = htmlentities2($id);
                    $id = str_replace(['&amp;', '&nbsp;', '#', "\n\r", "\r\n", "\r", "\n"], '_', $id);
                } else {
                    if (function_exists('transliterator_transliterate')) {
                        $id = transliterator_transliterate('Any-Latin; Latin-ASCII;', $id);
                    } else {
                        $id = remove_accents($id);
                    }
                    $id = preg_replace('/[^\d\-_A-Za-z ]+/', '', $id);
                }
                $id = preg_replace('/  +/', ' ', $id);
                $id = trim($id);
                $id = str_replace(' ', '_', $id);
                $id = preg_replace('/__+/', '_', $id);
                $id = trim($id, '_');
                if (!$id) {
                    $id = 'lwptoc';
                }
        }

        $id = (string)apply_filters('lwptoc_heading_id', $id, $label);

        $baseId = $id;
        $c = 0;
        while (in_array($id, static::$headingIds)) {
            $c++;
            $id = $baseId . $c;
        }
        static::$headingIds[] = $id;

        return $id;
    }
}
