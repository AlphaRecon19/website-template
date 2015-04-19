<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-19 17:07:37
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15562384315533d2c983fd81-49356593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7cba9c495075f6e6a5418136001ac9a5949ce89' => 
    array (
      0 => './templates/index.tpl',
      1 => 1429302822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15562384315533d2c983fd81-49356593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5533d2c98526c8_05223897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5533d2c98526c8_05223897')) {function content_5533d2c98526c8_05223897($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'Index'), 0);?>

      <div class="page-header">
        <h1>You've installed me successfuly, now to make magical things</h1>
      </div>
      <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body > .container</code>.</p>
      <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
