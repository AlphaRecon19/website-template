<?php
/*
 * @link https://github.com/AlphaRecon19/website-template
 * @version    0.0.2
 */
    /* Stop this from being a memory hog */
    ini_set('memory_limit','8M');
    ini_set('max_execution_time', 5);
    
    $_settings['HOSTNAME']              = 'template.koolserve.uk'; //The domain where this website will be hosted
    $_settings['DIR']                   = '/'; // Starts and ends with a / (forwardslash) eg. /folder/ or by default just /
    $_settings['ROOTDIR']               = '/var/www/vhosts/website-template/'; // Full path for this project
    $_settings['HTTP_PROTOCOL']         = 'https://'; // What http protocol we should use by default
    $_settings['ENFORCE_HTTP_PROTOCOL'] = 1; // Change this to enforce a secure connection or not | 0 = OFF & 1 = ON
    $_settings['CDN_ENABLE']            = 0; // Enable the use of the cdn? | 0 = OFF & 1 = ON
    $_settings['CDN_URL']               = 'https://cdn.koolserve.uk/template/'; // basedir url for the cdn
    $_settings['ENVIRONMENT']           = 'dev'; // What environment is this? [dev] staging live
    
    /* Define important urls here */
    $_settings['FULL_URL']              = $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_settings['DIR'];
    $_settings['ASSETS_URL']            = $_settings['FULL_URL'] . 'assets/';
    
    /* Smarty settings */
    $_settings['SMARTY']['auto']        = true; // Allow this config to be overwriten by depending on what environment is set [true] false
    $_settings['SMARTY']['force_compile'] = true; // This forces Smarty to recompile templates on every invocation. [true] false
    $_settings['SMARTY']['debugging']   = false; // Opens the debugging console true [false]
    $_settings['SMARTY']['caching']     = false; // Enable smarty cache? true [false]
    $_settings['SMARTY']['cache_lifetime'] = false; // This is the length of time in seconds that a template cache is valid. Once this time has expired, the cache will be regenerated. true [false]
    
    /* Magic autoloader for the koolserve classes */
    function koolserveAutoload( $classname ){
        global $_settings;
        @include_once($_settings['ROOTDIR'] . 'lib/koolserve/' . $classname . '.php');
        if( !class_exists( $classname, false ) ){
           die( 'Class '. $classname . ' has not been loaded yet' );
        }
    }

    /* Load Smarty */
    require_once($_settings['ROOTDIR'] . 'lib/Smarty/libs/SmartyBC.class.php');

    /* Set up the autoloaders */
    spl_autoload_register('smartyAutoload'); //Smarty
    spl_autoload_register('koolserveAutoload'); //koolserve

    $smarty = new SmartyBC;
    koolserve::init();
