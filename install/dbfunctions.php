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

$link = null;

function executeQueryWithPrefix($sql, $tablesPrefix)
{
    global $link;
    $sql = str_replace("CREATE TABLE `", "CREATE TABLE `" . $tablesPrefix, $sql);
    $sql = str_replace("INTO `", "INTO `" . $tablesPrefix, $sql);
    
    return mysqli_query($link, $sql);
}

function dbConnect($server, $user, $pass, $dbName)
{
    global $link;

    // FIX CRITIQUE POUR PHP 8.1+ : Désactiver les exceptions MySQLi
    // pour éviter le crash brutal (page blanche) en cas d'erreur SQL
    mysqli_report(MYSQLI_REPORT_OFF);

    /* install database with prefixed tables */
    $link = mysqli_connect($server, $user, $pass);
    
    if (!$link) {
        die('could not connect to mysql: ' . mysqli_connect_error());
    }

    $dbNameEscaped = mysqli_real_escape_string($link, $dbName);
    mysqli_query($link, 'CREATE DATABASE IF NOT EXISTS `' . $dbNameEscaped . '`');

    if (!mysqli_select_db($link, $dbName)) {
        die('could not select database: ' . mysqli_error($link));
    }
    
    mysqli_set_charset($link, "utf8mb4");
}

?>