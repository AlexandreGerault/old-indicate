<?php

if (!function_exists('formatColumnName')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function formatColumnName($str)
    {
        return ucfirst(str_replace('_', ' ', $str));
    }
}
