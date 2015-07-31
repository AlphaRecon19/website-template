<?php
/* koolserve
 *
 * Koolserve bootstrap php class
 *
 * @link https://github.com/AlphaRecon19/website-template
 * 
 * @author chris@koolserve.uk
 * 
 * @version    0.0.2
 */
class Koolserve{
    
    public $Smarty = '';
    
    function __construct($a)
    {
        // Get the current working dir
        $this->RootDIR = $a;
        
        // Load the config file
        $this->LoadConfigFile();
        
        // Get the autoloaders working
        $this->SetUpAutoLoaders();
        
        // Load classes into this object
        $this->LoadClasses();
        
        // Setup Smarty
        $this->SmartySetup();
        
        // Route the traffic
        $this->Router->RouteTraffic();
    }
    
    private function LoadClasses(){
        $files = scandir($this->RootDIR . 'lib/koolserve/');
        foreach($files as $file) {
            if($file !== '.' && $file !== '..' && $file != 'Koolserve.php'){
                $n = str_replace('.php', '', $file);
                $this->$n      = new $n($this);
            }
        }
    }
    
    private function SetUpAutoLoaders(){
        // Load smarty first
        require_once($this->RootDIR . 'lib/Smarty/libs/SmartyBC.class.php');
        
        //Register  autoloader
        spl_autoload_register('smartyAutoload'); //Smarty
        spl_autoload_register(array($this, 'KoolserveAutoload')); //koolserve
    }
    
    // Read and prease the confile file
    private function LoadConfigFile(){
        $a = file_get_contents($this->RootDIR . 'config/main.json');
        $this->Config = json_decode($a, true);
    }
    
    /* Setup Smarty */
    private function SmartySetup(){
        $this->Smarty = new SmartyBC;
        
        $this->CDN->SetAssetURLs();
        
        $SC = $this->Config["Smarty"]["Config"];
        
        $this->Smarty->force_compile    = $SC['ForceCompile'];
        $this->Smarty->debugging        = $SC['Debugging'];
        $this->Smarty->caching          = $SC['Caching'];
        $this->Smarty->cache_lifetime   = $SC['CacheLifetime'];
    }
    
    function KoolserveAutoload($c){
        @include_once($this->RootDIR . 'lib/koolserve/' . $c . '.php');
        if( !class_exists( $c, false ) ){
           die( 'Class '. $c . ' has not been loaded yet' );
        }
    }
}
 
 
 
 
class koolserveBC {
    public static function init() {
        self::setupenv();
        self::checkdomain();
        self::checkprotocol();
        self::smartysetup();
    }
    
    /* Make sure that this is the correct domain */
    private static function checkdomain(){
        global $_settings;
        if($_SERVER['HTTP_HOST'] !== $_settings['HOSTNAME']){
            header('location: '. $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_SERVER["REQUEST_URI"]);
        }
    }
    
    /* Make sure that this is the protocol we should be using */
    private static function checkprotocol(){
        global $_settings;
        $a = $_SERVER['REQUEST_SCHEME'];
        /*Clodflare*/
        if(isset($_SERVER["HTTP_X_FORWARDED_PROTO"])){
            $a = $_SERVER['HTTP_X_FORWARDED_PROTO'];
        }
        if($a. '://' !== $_settings['HTTP_PROTOCOL'] && $_settings['ENFORCE_HTTP_PROTOCOL'] == 1){
            header('location: '. $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_SERVER["REQUEST_URI"]);
        }
    }
    
    /* Configure the environment */
    private static function setupenv(){
        global $_settings;
        if(!isset($_settings['ENVIRONMENT'])){
            $_settings['ENVIRONMENT'] = 'live';
            echo "<!-- Please set the environment value in configuration.php file -->";
        }
        switch($_settings['ENVIRONMENT']){
            case 'dev':
                if($_settings['SMARTY']['auto'] == true){
                    $_settings['SMARTY']['force_compile'] = true;
                    $_settings['SMARTY']['debugging'] = false;
                    $_settings['SMARTY']['caching'] = false;
                    $_settings['SMARTY']['cache_lifetime'] = false;
                }
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
            break;
            case 'staging':
                if($_settings['SMARTY']['auto'] == true){
                    $_settings['SMARTY']['force_compile'] = true;
                    $_settings['SMARTY']['debugging'] = false;
                    $_settings['SMARTY']['caching'] = false;
                    $_settings['SMARTY']['cache_lifetime'] = 60;
                }
                error_reporting(E_ALL & ~E_NOTICE);
                ini_set('display_errors', 1);
            break;
            case 'live':
                if($_settings['SMARTY']['auto'] == true){
                    $_settings['SMARTY']['force_compile'] = true;
                    $_settings['SMARTY']['debugging'] = false;
                    $_settings['SMARTY']['caching'] = false;
                    $_settings['SMARTY']['cache_lifetime'] = 60;
                }
                error_reporting(0);
                ini_set('display_errors', 0);
            break;
            default:
                die('Unknown environment set - ' . $_settings['ENVIRONMENT']);
            break;
        }
    }
    
    /* Setup smarty */
    private static function smartysetup(){
        global $_settings, $smarty;
        foreach($_settings as $k=>$v){
            $smarty->assign("_settings_" . $k, $v, true);
        }
        $smarty->force_compile = $_settings['SMARTY']['force_compile'];
        $smarty->debugging = $_settings['SMARTY']['debugging'];
        $smarty->caching = $_settings['SMARTY']['caching'];
        $smarty->cache_lifetime = $_settings['SMARTY']['cache_lifetime'];
    }
    
    /* Run the 404 ad */
    public static function error($e = 404){
        global $_settings;
        header('location: ' . $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_settings['DIR'] . $e);
        exit();
    }
}
