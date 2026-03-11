<?php

/**
 * @file
 * Convenience file that registers autoload handler for HTML Purifier.
 */

if (function_exists('spl_autoload_register')) {
    // Use SPL autoload register strictly
    HTMLPurifier_Bootstrap::registerAutoload();
}

// vim: et sw=4 sts=4