<?php
/* cdn
 *
 * Koolserve CDN class
 *
 * @link https://github.com/AlphaRecon19/website-template
 * 
 * @author chris@koolserve.uk
 * 
 * @version    0.0.2
 */
class CDN{
    
    function __construct($a)
    {
        $this->ks = $a;
    }
    
    public function SetAssetURLs()
    {
        $a = $this->ks->Config['Assets'];
        $b = [];
        foreach($a as $k => $v){
            $b[$v] = $this->AssetURL($v);
        }
        $this->ks->Smarty->assign("assets", $b, true);
    }
    
    public function AssetURL($a)
    {
        $cdn = $this->ks->Config["Server"]["Config"]["CDN"];
        $url = $this->ks->Config["URL"];
        if(isset($cdn['Enable']) && isset($cdn['URL'])){
            if($cdn['Enable'] == 1){
                return $c['URL'] . $a;
            }else{
                return $url["Full"] . $url["Assets"] . $a;
            }
        }else{
            return $url["Full"] . $url["Assets"] . $a;
        }
    }
}