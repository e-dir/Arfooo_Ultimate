<?php
/**
 * Arfooo
 * * @package    Arfooo
 * @copyright  Copyright (c) Arfooo Annuaire (fr) and Arfooo Directory (en)
 * by Guillaume Hocine (c) 2007 - 2010
 * http://www.arfooo.com/ (fr) and http://www.arfooo.net/ (en)
 * @author     Guillaume Hocine & Adrian Galewski
 * @license    http://creativecommons.org/licenses/by/2.0/fr/ Creative Commons
 */


require_once (Config::get("CORE_PATH") . "Loader.php");

/**
 * PHP Magic Method to handle class auto load
 * Replaced __autoload with spl_autoload_register for PHP 7.4+ compatibility
 */
spl_autoload_register(function ($className) {
    Loader::loadClass($className);
});

/**
 * Get phrase translation
 * @param string $phrase to Translate
 * @lang  string $lang Destination language
 */
function _t($phrase, $lang = null)
{
    return Translate::getInstance($lang ? $lang : Config::get("language"))->getPhrase($phrase);
}

function utf8_htmlspecialchars($string)
{
    // FIX PHP 8.1+: Passing null to htmlspecialchars is deprecated. Casting to string fixes it.
    return htmlspecialchars((string)$string, ENT_QUOTES, 'UTF-8');
}

function utf8_substr($string, $start, $length)
{
    // FIX PHP 8.1+: Passing null to preg_replace is deprecated. Casting to string fixes it.
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start . '}' . '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $length . '}).*#s', '$1', (string)$string);
}

function utf8_strlen($string)
{
    // FIX PHP 8.2: utf8_decode is deprecated.
    // We use mb_strlen to count characters correctly in UTF-8.
    // If mbstring extension is not available, we fallback to iconv or regex.
    if (function_exists('mb_strlen')) {
        return mb_strlen((string)$string, 'UTF-8');
    }
    if (function_exists('iconv_strlen')) {
        return iconv_strlen((string)$string, 'UTF-8');
    }
    // Fallback regex (slower but standard)
    return preg_match_all('/./u', (string)$string, $tmp);
}

function array_map_recursive($func, $arr)
{
    $newArr = array();

    foreach ($arr as $key => $value) {
        $newArr[$key] = (is_array($value) || $value instanceof ArrayAccess) ? array_map_recursive($func, $value) : call_user_func($func, $value);
    }

    return $newArr;
}