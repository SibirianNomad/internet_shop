<?php


    //include models
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductsModel.php';

/**
 * добавить товар в корзину
 * @return false
 */

    function addtocartAction(){
        $itemId=isset($_GET['id']) ? $_GET['id'] : null;
        if(!$itemId) return false;

        $resData=[];

        //если значение не найдено, то добавляем

        if(isset($_SESSION['cart']) && array_search($itemId,$_SESSION['cart'])===false){
          $_SESSION['cart'][]=$itemId;
          $resData['cntItems']=count($_SESSION['cart']);
            $resData['success']=1;
        }else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }

/**
 * remove product from cart
 */

    function removefromcartAction(){
        $itemId=isset($_GET['id']) ? $_GET['id'] : null;
        if(!$itemId) exit();

        $index=array_search($itemId,$_SESSION['cart']);

        if(isset($_SESSION['cart']) && $index!==false){
            unset($_SESSION['cart'][$index]);
            $resData['cntItems']=count($_SESSION['cart']);
            $resData['success']=1;
        }else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
/**
 * Формирование страницы корзины
 */

    function indexAction($dbh,$smarty){
        $itemIds=isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        //get all category
        $categories=getAllMainCatsWithChildren($dbh);
        $rsProducts=getProductFromArray($dbh,$itemIds);

        $smarty->assign('pageTitle','Корзина');
        $smarty->assign('rsCategories',$categories);
        $smarty->assign('rsProducts',$rsProducts);

        loadTemplate($smarty,'header');
        loadTemplate($smarty,'cart');
        loadTemplate($smarty,'footer');
    }