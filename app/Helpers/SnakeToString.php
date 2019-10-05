<?php

if (!function_exists('snakeToString')) {

    /**
     * description
     *
     * @param string $str
     * @return string
     */
    function snakeToString($str)
    {
        return ucfirst(str_replace('_', ' ', $str));
    }
}
