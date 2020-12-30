<?php
session_start();//start session

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=[];
    }

    include_once '../config/db.php';//db connection
    include_once '../config/config.php';//main options
    include_once '../library/mainFunctions.php';//main functions

    //define function
    $actionName=isset($_GET['action']) ? $_GET['action']:'Index';

    //define controller
    $controllerName=isset($_GET['controller']) ? ucfirst($_GET['controller']):'Index';

    //инициализируем переменную шаблонизатора количества элементов в корзине
    $smarty->assign('cartCntItems',count($_SESSION['cart']));
    //инициализируем переменную шаблонизатора массив id продуктов, которые в корзине
    $smarty->assign('cart',$_SESSION['cart']);

    //инициализируем данные сессии о пользователе в шаблон
    if(isset($_SESSION['user'])){
        $smarty->assign('arUser',$_SESSION['user']);
    }

    loadPage($dbh,$smarty,$controllerName,$actionName);

