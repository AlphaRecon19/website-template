<?php

class Router{
    
    function __construct($a)
    {
        $this->ks = $a;
    }
    
    public function RouteTraffic()
    {
        @$query = $_GET['q'];
        @$thequery = explode('/',$query);
        
        if(!isset($_GET['q']) || is_null($_GET['q'])){$thequery[0] = 'home';}
            
        switch ($thequery[0]) {
        /* /home or / */
            case 'home' :
                $this->LoadSmarty('index', 'index.tpl');
            break;
        /* example */
            case 'example' :
                $this->ExamplePages($thequery);
            break;
        /* /404 */
            case '404' :
                $this->Do404Smarty();
            break;
        /* /* */
            default :
                $this->Do404Smarty();
            break;
        }
        
        return true;
    }
    
    private function ExamplePages($thequery)
    {
        $ExampleDIR = 'example/';
        $ExamplePF = 'example';
        switch ($thequery[1]) {
            /* /example/fa */
            case 'fa' :
                $this->LoadSmarty($ExamplePF . '-fa', $ExampleDIR . 'fa.tpl');
            break;
            /* /example/* */
            default :
                $this->Do404Smarty();
            break;
        }
    }
    
    private function Do404Smarty()
    {
        header(404);
        $this->ks->Smarty->assign("page", '', true);
        $this->ks->Smarty->display('errors/404.tpl');
    }
    
    private function LoadSmarty($a, $b)
    {
        $this->ks->Smarty->assign("page", $a, true);
        $this->ks->Smarty->display($b);
    }
}