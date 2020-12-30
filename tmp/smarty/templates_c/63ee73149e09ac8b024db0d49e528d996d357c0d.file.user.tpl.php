<?php /* Smarty version Smarty-3.1.6, created on 2020-12-22 09:39:28
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6208711655fe1b05c737675-56117647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1608626367,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6208711655fe1b05c737675-56117647',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fe1b05c75fd5',
  'variables' => 
  array (
    'arUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fe1b05c75fd5')) {function content_5fe1b05c75fd5($_smarty_tpl) {?>
<h1>Ваши регитсрационные данные</h1>

<table border="0">
    <tr>
        <td>Логин (email)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>Тел</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAddress" ><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" value=""></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" value=""></td>
    </tr>
    <tr>
        <td>Для того чтобы сохранить данные введите текущий пароль</td>
        <td><input type="password" id="curPwd" value=""></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="Сохранить изменения" onclick="updateUserData()"></td>
    </tr>
</table><?php }} ?>