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


/**
 * Class which handle request
 */
class Request extends DataAggregator
{
    private static $instance = null;

    /**
     * Returns an instance of Request object
     * @return Request
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Generates the standard request object
     */
    public function __construct()
    {
        $this->removeMagicGpc();
        parent::__construct($_POST);
    }

    /**
     * Get request value or false if not exists
     * @param  string $key Key of value which should be returned
     * @return string|boolean
     */
    public function get($key)
    {
        if (!isset($this->data[$key])) {
            return false;
        }
        return $this->data[$key];
    }

    function stripSlashesRecursive($oldArray)
    {
        $newArray = array();

        foreach ($oldArray as $key => $value) {
            $newArray[stripslashes($key)] = (is_array($value)) ? $this->stripSlashesRecursive($value) : stripslashes($value);
        }

        return $newArray;
    }

    private function removeMagicGpc()
    {
        // CORRECTION PHP 7.4+ : get_magic_quotes_gpc est obsolète et retourne false depuis PHP 5.4.
        // On ne l'exécute que si la version est inférieure à 5.4 pour éviter l'erreur Deprecated.
        if (version_compare(PHP_VERSION, '5.4.0', '<') && get_magic_quotes_gpc()) {
            $_POST = $this->stripSlashesRecursive($_POST);
            $_GET = $this->stripSlashesRecursive($_GET);
            $_COOKIE = $this->stripSlashesRecursive($_COOKIE);
        }
    }

    public function getArray($fields)
    {
        $results = array();

        foreach ($fields as $key) {
            $results[$key] = $this->get($key);
        }

        return $results;
    }

    /**
     * Checks value is defined and isn't empty string
     * @param  string $key Key which should be checked
     * @return boolean
     */
    public function hasValue($key)
    {
        if (!isset($this->data[$key])) {
            return false;
        }
        if ($this->data[$key] === "") {
            return false;
        }
        return true;
    }

    /**
     * Returns http referer url
     * @return string
     */
    public function getRefererUrl()
    {
        return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;
    }

    public function getIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getCookie($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : false;
    }

    public function setCookie($name, $value)
    {
        setcookie($name, $value);
    }

}