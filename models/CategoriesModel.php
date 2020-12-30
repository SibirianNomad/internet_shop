<?php
/**
 * Models for table 'categories'
 */

/**
 * @param $dbh
 * Получить все дочернии категории для категории @param $id
 */
    function getAllChildrenForCats($dbh,$id){
        $children=$dbh->query("SELECT * FROM categories WHERE parent_id=$id");
        return createRsArraySmarty($children);
    }


/**
 * Вернуть главные категории с привязками дочерних
 * @param $dbh
 * @return array
 */

    function getAllMainCatsWithChildren($dbh){
        $categories=[];
        foreach ($dbh->query('SELECT * FROM categories WHERE parent_id=0') as $category){
            $rsChildren=getAllChildrenForCats($dbh,$category['id']);

            if($rsChildren){
                $category['children']=$rsChildren;
            }
            $categories[]=$category;
        }
        return $categories;
    }

/**
 * @param $dbh
 * @param $id
 * @return array|false
 * Получить категории по id
 */

    function getCatById($dbh,$id){
        $categories=$dbh->query("SELECT * FROM categories WHERE id=$id");
        return createRsArraySmarty($categories);
    }