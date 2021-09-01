<?php
namespace pechenki\TelsenderEvent\src;
/**
 * Class ArrayHelper
 * @package pechenki\TelsenderEvent\src
 */

class ArrayHelper{


    /**
     * @param $Array
     * @return string
     */
    public static function ToString($Array){
        $str = '';
        foreach ($Array as $key => $param){
            $str .= $key . ': '.filter_var($param, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $str .=PHP_EOL;
        }
        return $str;

    }
}