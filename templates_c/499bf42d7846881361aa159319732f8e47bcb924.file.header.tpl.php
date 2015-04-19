<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-19 17:07:37
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18607054335533d2c991ae48-55082467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '499bf42d7846881361aa159319732f8e47bcb924' => 
    array (
      0 => './templates/header.tpl',
      1 => 1429299680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18607054335533d2c991ae48-55082467',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    '_settings_ASSETS_URL' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5533d2c9930c58_58534021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5533d2c9930c58_58534021')) {function content_5533d2c9930c58_58534021($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?><!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang=""><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['_settings_ASSETS_URL']->value;?>
css/main.css">

</head>

<?php echo $_smarty_tpl->getSubTemplate ("navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- Begin page content -->
    <div class="container container-hidden">
<!-- EOF header.tpl  --><?php }} ?>
