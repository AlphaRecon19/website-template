<?php
    /* Stop this from being a memory hog */
    ini_set('memory_limit','8M');
    ini_set('max_execution_time', 5);

    /* Show all errors, disbale on production */
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $_settings['HOSTNAME']              = 'template.koolserve.uk'; //The domain where this website will be hosted
    $_settings['DIR']                   = '/'; // Starts and ends with a / (forwardslash) eg. /folder/ or by default just /
    $_settings['NAME']                  = 'website-template'; //Project name
    $_settings['BUILD']                 = '1'; //Add to this when you make a commit
    $_settings['RELEASE']               = '0.0.1 Alpha'; //Change the when you feel many lines have been added (or removed)
    $_settings['ROOTDIR']               = '/var/www/vhosts/template/'; // Full path for this project
    $_settings['HTTP_PROTOCOL']         = 'https://'; //What http protocol we should use by default
    $_settings['ENFORCE_HTTP_PROTOCOL'] = 1; //Change this to enforce a secure connection or not | 0 = OFF & 1 = ON    

    /* Define important urls here */
    $_settings['FULL_URL']              = $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_settings['DIR'];
    $_settings['ASSETS_URL']            = $_settings['FULL_URL'] . 'assets/';
    
    /* Magic autoloader for the koolserve classes */
    function koolserveAutoload( $classname ){
        global $_settings;
        @include_once($_settings['ROOTDIR'] . 'lib/koolserve/' . $classname . '.php');
        if( !class_exists( $classname, false ) ){
           die( 'Class '. $classname . ' has not been loaded yet' );
        }
    }

    /* Load Smarty */
    require_once($_settings['ROOTDIR'] . 'lib/Smarty/libs/Smarty.class.php');

    /* Set up the autoloaders */
    spl_autoload_register('smartyAutoload'); //Smarty
    spl_autoload_register('koolserveAutoload'); //koolserve

    $smarty = new Smarty;
    koolserve::smartysetup();
    /* edit this class in /lib/koolserve/koolserve.php */