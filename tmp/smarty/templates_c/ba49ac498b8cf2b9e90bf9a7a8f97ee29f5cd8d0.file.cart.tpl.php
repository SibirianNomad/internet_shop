<?php /* Smarty version Smarty-3.1.6, created on 2020-12-18 10:10:57
         compiled from "../views/default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8494293315fdc72216b4785-75299868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba49ac498b8cf2b9e90bf9a7a8f97ee29f5cd8d0' => 
    array (
      0 => '../views/default\\cart.tpl',
      1 => 1608120920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8494293315fdc72216b4785-75299868',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fdc722171347',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdc722171347')) {function content_5fdc722171347($_smarty_tpl) {?>

    <h1>Корзина</h1>
    <?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value){?>
        В корзине пусто
    <?php }else{ ?>
        <h2>Данные заказа</h2>
        <table>
            <tr>
                <td>
                    №
                </td>
                <td>
                    Наименование
                </td>
                <td>
                    Количество
                </td>
                <td>
                    Цена за единицу
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Действие
                </td>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
                <tr>
                    <td>
                        <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>

                    </td>
                    <td>
                        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
                    </td>
                    <td>
                       <input
                               name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                               id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                               type="text"
                               value="1"
                               onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"
                       />
                    </td>
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <a  id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" alt="Удалить">Удалить</a>

                        <a style="display:none;" id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" alt="Восстановить">Восстановить</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php }?><?php }} ?>