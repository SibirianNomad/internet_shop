<?php /* Smarty version Smarty-3.1.6, created on 2020-12-18 10:03:53
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4326907925fdc7079f3e6d8-17551812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1608281716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4326907925fdc7079f3e6d8-17551812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPatch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5fdc707a0296a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fdc707a0296a')) {function content_5fdc707a0296a($_smarty_tpl) {?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPatch']->value;?>
css/main.css" type="text/css"/>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
    </head>
    <body>
    <div id="header">
        <h1>my shop - интернет магазин</h1>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div id="centerColumn"><?php }} ?>