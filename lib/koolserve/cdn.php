<?php
/* cdn
 *
 * Koolserve CDN class
 *
 * @link https://github.com/AlphaRecon19/website-template
 * 
 * @author chris@koolserve.uk
 * 
 * @version    0.0.1
 */
class cdn extends koolserve {
    public static function asset_url($a){
        global $_settings;
        if(isset($_settings['CDN_ENABLE']) && isset($_settings['CDN_URL'])){
            if($_settings['CDN_ENABLE'] == 1){
                return $_settings['CDN_URL'] . $a;
            }else{
                return $_settings['ASSETS_URL'] . $a;
            }
        }else{
            return $_settings['ASSETS_URL'] . $a;
        }
    }
}