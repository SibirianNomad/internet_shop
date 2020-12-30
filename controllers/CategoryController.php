<?php
/**
 *controller category /category/1
 */

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

//Формирование страницы категории

function indexAction($dbh,$smarty){
    $children=null;
    $products=null;
    if(isset($_GET['id'])){
        $catId=$_GET['id'];
    }else{
        $catId=null;
    }
    if(!$catId)exit();

    $category=getCatById($dbh,$catId);
    //если главная категория то показываем дочерние категории, иначе показываем товар
    if($category[0]['parent_id']==0){
        $children=getAllChildrenForCats($dbh,$catId);
    }else{
        $products=getProductsByCategoryId($dbh,$catId);
    }
    $categories=getAllMainCatsWithChildren($dbh);

    $smarty->assign('pageTitle','Товары категории '.$category[0]['name']);

    $smarty->assign('rsCategory',$category);
    $smarty->assign('rsChildren',$children);
    $smarty->assign('rsProducts',$products);

    $smarty->assign('rsCategories',$categories);

    loadTemplate($smarty,'header');
    loadTemplate($smarty,'category');
    loadTemplate($smarty,'footer');
}