<?php

class Router{
    
    function __construct($a)
    {
        $this->ks = $a;
    }
    
    public function RouteTraffic(){
        @$query = $_GET['q'];
        @$thequery = explode('/',$query);
        
        if(!isset($_GET['q'])){$thequery[0] = '';}
        //if($_SERVER["REQUEST_URI"] === $_settings['DIR']){$thequery[0] = 'home';}
            
        switch ($thequery[0]) {
        /* /home or / */
            case 'home' :
                $this->ks->Smarty->display('index.tpl');
            break;
        /* /404 */
            case '404' :
                header(404);
                $this->ks->Smarty->display('errors/404.tpl');
            break;
        /* /* */
            default :
                header(404);
                $this->ks->Smarty->display('errors/404.tpl');
            break;
        }
        
        return true;
    }
    
    
}