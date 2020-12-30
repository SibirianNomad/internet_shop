<?php /* Smarty version Smarty-3.1.6, created on 2020-12-18 10:05:07
         compiled from "../views/default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21256156205fdc70c39e7ab0-66519856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76efe512959f670dcfbe2dc8447081a8ad91a48b' => 
    array (
      0 => '../views/default\\category.tpl',
      1 => 1608093958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21256156205fdc70c39e7ab0-66519856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'rsProducts' => 0,
    'item' => 0,
    'rsChildren' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fdc70c3a34b0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdc70c3a34b0')) {function content_5fdc70c3a34b0($_smarty_tpl) {?>

    <h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
    <?php if ($_smarty_tpl->tpl_vars['rsProducts']->value!=null){?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
            <div style="float: left;padding: 0 30px 40px 0;">
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" height="100">
                </a><br>
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            </div>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%3===0){?>
                <div style="clear: both"></div>
            <?php }?>
        <?php } ?>
    <?php }else{ ?>
        <div>Товаров данной категории нет</div>
    <?php }?>
    <div style="clear: both"></div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildren']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
    <?php } ?><?php }} ?>