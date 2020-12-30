<?php

/*
 * Файл настроек
 * */

    //константы для обращения к контроллерам
    define('PatchPrefix','../controllers/');
    define('PatchPostfix','Controller.php');


    //используемый шаблон
    $template='default';

    //константы для обращения к файлам шаблона
    define('TemplatePrefix',"../views/{$template}/");
    define('TemplatePostfix',".tpl");

    //пути к файлам шаблона в вебпростаранстве
    define('TemplateWebPatch',"/templates/{$template}/");

    //Инициализация шаблонизатора Smarty

    require ('../library/Smarty/libs/Smarty.class.php');
    $smarty=new Smarty();

    $smarty->setTemplateDir(TemplatePrefix);
    $smarty->setCompileDir('../tmp/smarty/templates_c');
    $smarty->setCacheDir('../tmp/smarty/cache');
    $smarty->setConfigDir('../library/Smarty/configs');

    $smarty->assign('templateWebPatch',TemplateWebPatch);



