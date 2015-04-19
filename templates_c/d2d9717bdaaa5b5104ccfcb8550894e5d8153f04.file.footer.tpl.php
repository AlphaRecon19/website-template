<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-04-19 17:07:37
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9285107155533d2c99361d4-65426736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2d9717bdaaa5b5104ccfcb8550894e5d8153f04' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1429302855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9285107155533d2c99361d4-65426736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_settings_NAME' => 1,
    '_settings_ASSETS_URL' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5533d2c993b318_18016697',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5533d2c993b318_18016697')) {function content_5533d2c993b318_18016697($_smarty_tpl) {?><!-- START footer.tpl  -->
</div> <!-- /container -->
    </div>
      <footer class="footer">
        <div class="container">
          <p class="text-center copy-text">2015 ©<?php echo $_smarty_tpl->tpl_vars['_settings_NAME']->value;?>
 | Designed & Hosted by: <a href="https://koolserve.uk" class="nostyle" target="_blank">KoolServe</a></p>
        </div>
      </footer>

    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_settings_ASSETS_URL']->value;?>
js/koolserve.js"><?php echo '</script'; ?>
>
  </body>
</html>
<!-- EOF footer.tpl  --><?php }} ?>
