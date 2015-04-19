<?php
class koolserve {
    public static function smartysetup(){
        global $_settings, $smarty;
        foreach($_settings as $k=>$v){
            $smarty->assign("_settings_" . $k, $v, true);
        }
        /*
         * This is set to a dev enviorment by default
         * More info: http://www.smarty.net/docs/en/
        */
        $smarty->force_compile = true;
        $smarty->debugging = false;
        $smarty->caching = false;
        $smarty->cache_lifetime = 1;
    }

    public static function error($e = 404){
        global $_settings;
        header('location: ' . $_settings['HTTP_PROTOCOL'] . $_settings['HOSTNAME'] . $_settings['DIR'] . $e);
        exit();
    }

    public function render_select($array, $searchfor, $id = null, $class = "form-control chzn-select"){
        $buffer = '<select id="'.$id.'" class="'.$class.'"><option value="" selected="selected" disabled="disabled">Please Select..</option>';
        foreach($array as $key => $value){
            if($searchfor == $key){
                $buffer .= '<option value="'.$key.'" selected>'.$value.'</option>';
            }else{
                $buffer .= '<option value="'.$key.'">'.$value.'</option>';
            }
        }
        $buffer .= '</select>';
        return $buffer;
    }

    public function returnsalt($password){
        $return['salt'] = base64_encode(md5(base64_encode((rand(1, rand(1, 9999999999) * rand(1, rand(1, 9999999999)))))));
        $return['hash'] = hash('sha512', $return['salt'] . $password);
        return $return;
    }
    
    /*createhash
     *
     *Create a uniqe hash that is very uniqe
     *
     *@return string The uniqe hash
     */
    public static function createhash(){
        return hash('sha1', base64_encode(md5(microtime())));
    }

    /*returnip
     *
     *Return the users ip, even is they are behind a proxy
     *
     *@return string Users ip
     */
    public static function returnip(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            /* The default way to get the IP */
            return $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            /* User is behind a proxy? */
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            /* Return this as a last restort */
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    /*minify
     *@link http://stackoverflow.com/a/6225706
     *
     *Minify the supplied html code
     *
     *@param string $buffer The html code to be minified
     *
     *@return string The minified code
     */
    public static function minify($buffer) {
        $search = array(
            '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
            '/[^\S ]+\</s',  // strip whitespaces before tags, except space
            '/(\s)+/s'       // shorten multiple whitespace sequences
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );
        $buffer = preg_replace($search, $replace, $buffer);
        return $buffer;
    }
}
