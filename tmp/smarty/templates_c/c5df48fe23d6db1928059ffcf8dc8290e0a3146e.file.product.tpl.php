<?php /* Smarty version Smarty-3.1.6, created on 2020-12-22 09:01:03
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15746604245fe1a7bf508137-25532412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1608110580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15746604245fe1a7bf508137-25532412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fe1a7bf7d910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fe1a7bf7d910')) {function content_5fe1a7bf7d910($_smarty_tpl) {?>
    <h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

    <img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
    Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


        <a style="display:<?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value){?>none<?php }?>" id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>

        <a style="display:<?php if ($_smarty_tpl->tpl_vars['itemInCart']->value){?>none<?php }?>" id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину">Добавить в корзину</a>

    <p>Описание <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }} ?>