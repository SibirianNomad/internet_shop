<?php

/*
 *
 * Main functions
 *
 */

/**
 * Формирование запрашиваемой страницы
 * @param $controllerName
 * @param string $actionName
 */

    function loadPage($dbh,$smarty,$controllerName,$actionName='Index'){
        include_once PatchPrefix.$controllerName.PatchPostfix;
        $function=$actionName.'Action';
        $function($dbh,$smarty);

    }

/**
 * @param $smarty
 * @param $templateName
 * Загрузка шаблона
 */
    function loadTemplate($smarty,$templateName){
        $smarty->display($templateName.TemplatePostfix);
    }

/**
 * @param $object
 * @return array|false
 *
 * Преобразование результатов выборки из БД в ассоциативный массив
 */
    function createRsArraySmarty($object){
        if(!$object) return false;
        $arr=[];
        foreach ($object as $row){
            $arr[]=$row;
        }
        return $arr;
    }

    function dd($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        exit();
    }
    function redirect($url){
        if(!$url) $url='/';
        header("Location:$url");
        exit;
    }