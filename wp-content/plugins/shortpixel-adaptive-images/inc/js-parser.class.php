<?php
/**
 * User: simon
 * Date: 27.01.2020
 */

class ShortPixelJsParser {

    protected $ctrl;

    public function __construct($ctrl)
    {
        $this->ctrl = $ctrl;
    }

    public function findJsonBlocks($script, $type = 'html') {// can also be 'cdata' or 'plain'
        $jsonBlocks = array();
        $crtBlock = false;
        $tag = $boundary = ($type !== 'html'); //if searching for htmlTag set tag found to false
        $iStart = 0;
        $comment = false;
        if($type == 'cdata') {
            //skip the <![CDATA[ part
            $iStart = strpos($script, '<![CDATA[');
            if($iStart !== false) {
                $iStart += 9;
            }
        }
        for($i = $iStart, $str = $var = $eq = $json = 0; $i < strlen($script); $i++) {
            $crt = $script[$i];

            //first we skip the HTML script tag if present
            if(!$tag) {
                if($str && ($crt == $str) && ($script[$i-1] !== '\\')) {
                    $str = false; //string ended inside tag
                } elseif (($script[$i-1] !== '\\') && ($crt === '\'' || $crt === '"')) {
                    $str = $crt; //started string inside tag
                } elseif ($crt == '>') {
                    $tag = $boundary = true; //tag ended, a var can start
                }
                continue;
            }

            //comments take precendence over the rest of the JS code in any case except strings
            if( !$str && (   ($comment == '/' && self::isNewLine($crt))
                          || ($comment == '*' && $crt == '*' && $script[$i + 1] == '/'))) {
                $comment = false;
                continue;
            }
            if($crt == '/' && ($script[$i + 1] == '/' || $script[$i + 1] == '*')) {
                $comment = $script[$i + 1];
                continue;
            }

            //JS code
            if($json > 0){
                if($str && ($crt == $str) && ($script[$i-1] !== '\\')) {
                    $str = false; //string ended inside JSON
                } elseif (($script[$i-1] !== '\\') && ($crt === '\'' || $crt === '"')) {
                    $str = $crt; //started string inside JSON, ignore the {} until it ends
                }elseif($crt == '}') {
                    if($json == 1) {
                        //record the current block
                        $crtBlock['end'] = $i + 1;
                        $jsonBlocks[] = (object)$crtBlock;
                        $json = $eq = $var = false;
                        $boundary = true;
                    } else {
                        $json--;
                    }
                } elseif($crt == '{') {
                    $json++;
                }
            }elseif($eq) {
                if(self::isWhite($crt)) {
                    //nada
                } elseif($crt === '{'){
                    //JSON starting...
                    $str = $crt;
                    $json = 1;
                    $crtBlock = array('start' => $i);
                } else {
                    $eq = $var = $boundary = false;
                }

            }elseif($var) {
                //skip until '='
                if($crt == '=') {
                    $eq = true;
                } elseif(self::isBoundary($crt)) {
                    $var = false; //another boundary, a var without value.
                    $boundary = true;
                }
                //just skip otherwise, var name under crt pos.
            }elseif($boundary) {
                //latest non-white was semicolon, check for var
                if(self::isWhite($crt) || self::isBoundary($crt)) {
                    //nada, skip
                } elseif(substr($script, $i, 3) == 'var' && self::isWhite($script[$i + 3])) {
                    $var = true;
                    $i += 3;
                } else {
                    //not followed by var, nor space, reset the boundary
                    $boundary = false;
                }

            } else {
                if($crt == ';' || $crt == '}') {
                    $boundary = true;
                }
            }
        }
        return $jsonBlocks;
    }

    public function parseJsonBlocks($script, $type = 'html') {
        $jsonBlocks = $this->findJsonBlocks($script, $type);
        $parser = new ShortPixelJsonParser($this->ctrl);
        foreach($jsonBlocks as $js) {
            $script = substr($script,0, $js->start) . json_encode($parser->parse(json_decode(substr($script, $js->start, $js->end - $js->start)))) . substr($script, $js->end);
        }
    }

    protected static function isWhite($chr) {
        return in_array($chr, array(' ', "\t", "\n", "\f", "\r", "\v"));
    }

    protected static function isNewLine($chr) {
        return in_array($chr, array("\n", "\f", "\r"));
    }

    protected static function isBoundary($chr) {
        return $chr == ';' || $chr == '}';
    }
}
