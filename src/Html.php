<?php

namespace pechenki\TelsenderEvent\src;

/**
 * Class html
 * @package pechenki\TelsenderEvent\src
 * @author Pechenki
 * @version 0.1
 */
class Html
{

    /**
     * @param $tagname
     * @param null $content
     * @param array|null $properties
     * @return string
     */
    public static function tag($tagname, $content = NULL, array $properties = NULL)
    {
        $html = "<$tagname";

        if (!($properties === NULL))
            foreach ($properties as $name => $value) {
                $html .= " $name=\"$value\"";
            }

        $html .= ($content === NULL || $content == "") ? " />" : ">$content</$tagname>";

        return $html;
    }
}