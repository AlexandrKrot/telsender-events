<?php

namespace pechenki\TelsenderEvent\src;

/**
 * Class FormHelper
 * @package pechenki\TelsenderEvent\src
 * @author Pechenki
 * @version 0.1
 */
class FormHelper
{
    /**
     * @param array $options
     * @return string
     */
    public static function Begin(array $options)
    {
        $html = "<form";

        if (!($options === NULL))
            foreach ($options as $name => $value) {
                $html .= " $name=\"$value\"";
            }

        $html .= " />";

        return $html;
    }

    /**
     * @return string
     */
    public static function end()
    {
        return "</form>";
    }

    /**
     * @param array $options
     * @return string
     */
    public static function input(array $options, $label = NULL)
    {

        return self::oneTag('input', $options, $label);
    }

    /**
     * Select
     */

    public static function select($option, $options = [], $label = NULL)
    {
        $values = $options['value'];
        unset($options['value']);

        $optionTag = self::options($options);
        $out =  '<select '.$optionTag.'>';
        foreach ($option as $key => $value) {
            $selected = false;
            if (is_array($values) && in_array( $key,$values)){
                $selected = 'selected';
            }else{
                if ( $key  == $values) $selected = 'selected';
            }

            $out .=  ' <option  '.$selected.' value="'.$key.'">'. $value.'</option>';
        }
        $out .= '</select>';

        return $out;
    }

    /**
     * @param array $options
     * @param null $label
     * @return string
     */
    public static function checkbox(array $options, $label = NULL)
    {

        $options['type'] = 'checkbox';

        if (isset($options['checked']) && $options['checked'] == true) {
            $options['checked'] = '';
        } else {
            unset($options['checked']);
        }

        return self::oneTag('input', $options, $label);
    }

    /**
     * @param $name
     * @param null $options
     * @return string
     */
    public static function submit($name, $options = NULL)
    {
        $options['type'] = 'submit';

        return Html::tag('button', $name, $options);
    }

    /**
     * @param string $tag
     * @param array $options
     * @return string
     */
    public static function oneTag(string $tag, array $options, $label = NULL)
    {
        $html = "<" . $tag;
        if (!($options === NULL))
            foreach ($options as $name => $value) {
                $html .= " $name=\"$value\"";
            }
        $html .= " />";

        if ($label) {
            $label = "<span>" . $label . "</span>";
            $html = '<label>' . $html . $label . '</label>';
        }
        return $html;
    }

    /**
     * @param $options
     * @return string
     */
    public static function options($options){

        $html = '';
        if (!($options === NULL))
            foreach ($options as $name => $value) {
                $html .= " $name=\"$value\"";
            }

        return $html;

    }


}