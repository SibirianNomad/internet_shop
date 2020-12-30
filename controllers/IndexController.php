<?php
/**
 * 
 */

    //include models
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductsModel.php';

    function testAction(){
        echo '<br>IndexController->testAction';
    }

    function indexAction($dbh,$smarty){
        $rsCategories=getAllMainCatsWithChildren($dbh);
        $rsProducts=getLastProducts($dbh,10);

        $smarty->assign('pageTitle','Main page');
        $smarty->assign('rsCategories',$rsCategories);
        $smarty->assign('rsProducts',$rsProducts);

        loadTemplate($smarty,'header');
        loadTemplate($smarty,'index');
        loadTemplate($smarty,'footer');

    }