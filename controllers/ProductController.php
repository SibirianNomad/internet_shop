<?php
/**
 * контроллен страницы товара product/1
 */


//include models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * формирование страницы продукта
 */

function indexAction($dbh,$smarty){
    if(isset($_GET['id'])){
        $productId=$_GET['id'];
    }else{
        $productId=null;
    }
    if(!$productId)exit();
    //get product data by id
    $item=getProductsById($dbh,$productId);
    //get all category
    $categories=getAllMainCatsWithChildren($dbh);

    //check cart for this product
    $smarty->assign('itemInCart',0);
    if(in_array($productId,$_SESSION['cart'])){
        $smarty->assign('itemInCart',1);
    }

    $smarty->assign('pageTitle','');
    $smarty->assign('rsCategories',$categories);
    $smarty->assign('rsProduct',$item[0]);

    loadTemplate($smarty,'header');
    loadTemplate($smarty,'product');
    loadTemplate($smarty,'footer');
}