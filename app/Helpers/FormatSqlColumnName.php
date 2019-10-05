<?php

if (!function_exists('formatColumnName')) {

    /**
     * description
     *
     * @param string $str
     * @return string
     */
    function formatColumnName($str)
    {
        return ucfirst(str_replace('_', ' ', $str));
    }
}
