<?php
include('configuration.php');
  @$query = $_GET['q'];
  @$thequery = explode('/',$query);
  
  if(!isset($_GET['q'])){$thequery[0] = '';}
  if($_SERVER["REQUEST_URI"] === '/'){$thequery[0] = 'home';}
  
switch ($thequery[0]) {
/* /home or / */
    case 'home' :
      $smarty->display('index.tpl');
    break;
/* /contact-us */
    case 'contact-us' :
      $smarty->display('contact-us.tpl');
    break;
/* /404 */
    case '404' :
      header(404);
      $smarty->display('errors/404.tpl');
    break;
/* /* */
    default :
      header(404);
      $smarty->display('errors/404.tpl');
    break;
}
