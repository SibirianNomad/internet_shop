<?php
/**
 * Models for table 'Products'
 */
/**
 * @param $dbh
 * @param null $limit
 * выбираем последние добавленные товары
 */
    function getLastProducts($dbh,$limit=null){
        if($limit){
            $limit='LIMIT '.$limit;
        }
        $products=$dbh->query("SELECT * FROM products ORDER BY id DESC $limit");

        return createRsArraySmarty($products);
    }
    function getProductsByCategoryId($dbh,$id){
        $products=$dbh->query("SELECT * FROM products WHERE category_id=$id ORDER BY id");
        return createRsArraySmarty($products);
    }
    function getProductsById($dbh,$id){
        $product=$dbh->query("SELECT * FROM products WHERE id=$id");
        return createRsArraySmarty($product);
    }
    //выбрать все товары по массиву с id этих товаров
    function getProductFromArray($dbh,$ids){
        if($ids){
            $ids=implode(',',$ids);
        }else{
            $ids='';
        }

        $products=$dbh->query("SELECT * FROM products WHERE id IN  ('$ids')");
        return createRsArraySmarty($products);
    }