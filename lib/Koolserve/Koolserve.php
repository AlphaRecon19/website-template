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
    private $ksdir = 'lib/Koolserve/';
    
    function __construct($a)
    {
        // Get the current working dir
        $this->RootDIR = $a . '/';
        
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
        $files = scandir($this->RootDIR . $this->ksdir);
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
        $this->Smarty->assign("url", $this->Config["URL"]["Full"], true);
        
        $SC = $this->Config["Smarty"]["Config"];
        
        $this->Smarty->force_compile    = $SC['ForceCompile'];
        $this->Smarty->debugging        = $SC['Debugging'];
        $this->Smarty->caching          = $SC['Caching'];
        $this->Smarty->cache_lifetime   = $SC['CacheLifetime'];
    }
    
    function KoolserveAutoload($c){
        @include_once($this->RootDIR . $this->ksdir . $c . '.php');
        if( !class_exists( $c, false ) ){
           die( 'Class '. $c . ' has not been loaded yet' );
        }
    }
}