<?php
/* Smarty version 3.1.30, created on 2017-06-29 10:26:51
  from "c:\xampp\php_libs\smarty\templates\testsmarty.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5954575b644d96_66278598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8db3eef593361fb62af7df8edd81513a3d896291' => 
    array (
      0 => 'c:\\xampp\\php_libs\\smarty\\templates\\testsmarty.tpl',
      1 => 1498699608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5954575b644d96_66278598 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>サンプル</title>
</head>
<body>
<ul>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits']->value[0];?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits']->value[1];?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits']->value[2];?>
</li>
</ul>

<ul>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits2']->value['apple'];?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits2']->value['orange'];?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['fruits2']->value['grape'];?>
</li>
</ul>
<?php if ($_smarty_tpl->tpl_vars['sample']->value == 10) {?><p>sample is 10</p>
<?php } elseif ($_smarty_tpl->tpl_vars['sample']->value > 5) {?><p>sample larger than 5</p>
<?php } else { ?><p>sample less than 5</p>
<?php }?>
<ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fruits']->value, 'fruit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['fruit']->value) {
?>
  <li><?php echo $_smarty_tpl->tpl_vars['fruit']->value;?>
</li>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>
<ul>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['fruits2']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
  <li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 ... <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>


<!--ここに追記-->

</body>
</html>
<?php }
}
