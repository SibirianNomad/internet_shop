<?php /* Smarty version Smarty-3.1.6, created on 2020-12-22 09:19:41
         compiled from "../views/default\leftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9289633635fdc707a08cd86-00838128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd86026e14cd6d235743b3882c7fc10799a2fe413' => 
    array (
      0 => '../views/default\\leftcolumn.tpl',
      1 => 1608624211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9289633635fdc707a08cd86-00838128',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fdc707a0a6dd',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'children' => 0,
    'arUser' => 0,
    'cartCntItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdc707a0a6dd')) {function content_5fdc707a0a6dd($_smarty_tpl) {?>
<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
           <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"> <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>
            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])){?>
                <?php  $_smarty_tpl->tpl_vars['children'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['children']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['children']->key => $_smarty_tpl->tpl_vars['children']->value){
$_smarty_tpl->tpl_vars['children']->_loop = true;
?>
                    --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['children']->value['id'];?>
/"> <?php echo $_smarty_tpl->tpl_vars['children']->value['name'];?>
</a><br>
                <?php } ?>
            <?php }?>
        <?php } ?>
    </div>
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>
    <div id="userBox">
        <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayname'];?>
</a>
        <a href="#" onclick="logout();">Выход</a>
    </div>
    <?php }else{ ?>
    <div id="loginBox">
        <div class="menuCaption">Авторизация</div>
        <input type="text" id="loginEmail" name="loginEmail" value=""/><br>
        <input type="password" id="loginPwd" name="loginPwd" value=""/><br>
        <input type="submit" onclick="login()" value="Войти"/>
    </div>

    <div id="registerBox">
        <a href="#" class="menuCaption showHidden" onclick="showRegisterBox()">Регистрация</a>
        <div id="registerBoxHidden" style="display: none">
            email<br>
            <input type="text" id="email" name="email" value=""/>
            Пароль<br>
            <input type="password" id="pwd1" name="pwd1" value=""/>
            Повторить пароль<br>
            <input type="password" id="pwd2" name="pwd2" value=""/>
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
        </div>
    </div>
    <?php }?>
    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзину</a>
    <span id="cartCntItems">
        <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0){?><?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
<?php }else{ ?>Пусто<?php }?>
    </span>
</div>
<?php }} ?>