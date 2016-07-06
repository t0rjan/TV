<?php

/**
 *array_filter回调函数--判断数组||字符串是否为空
 */
if (!function_exists('filter_empty')) {

    function filter_empty($data)
    {
        if (count($data) > 0 || strlen(trim($data)) > 0) {
            return true;
        }
        return false;
    }
}

