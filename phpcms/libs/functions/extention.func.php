<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */
 

 /**
 * 获取环境变量的值
 * @param  [string] $key
 * @param  [mixed]  $default
 * @return [mixed]
 */
function env($key, $default = null)
{
    $value = getenv($key);

    if ($value === false) return $default;

    switch (strtolower($value))
    {
        case 'true':
        case '(true)':
            return true;

        case 'false':
        case '(false)':
            return false;

        case 'null':
        case '(null)':
            return null;

        case 'empty':
        case '(empty)':
            return '';
    }

    return $value;
}
