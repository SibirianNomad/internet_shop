<?php
/**
 * Контроллер пользовтеля
 */

//include models
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * AJAX регистрация пользователя.
 * Инициализация сессионной переменной ($_SESSION['user'])
 *
 * @return json массив данных нового пользователя
 *
 *
 */
function registerAction($dbh){

    $email=isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email=trim($email);

    $pwd1=isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2=isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone=isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address=isset($_REQUEST['address']) ? $_REQUEST['address'] : null;

    $name=isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name=trim($name);

    $resData=null;
    $resData=checkRegisterParams($email,$pwd1,$pwd2);

    if(!$resData && checkUserEmail($dbh,$email)){
        $resData['success']=false;
        $resData['message']="Пользователь с email $email уже зарегистрирован";
    }
    if(!$resData){
        $pwdMD5=md5($pwd1);
        $userData=registerNewUser($dbh,$email,$pwdMD5,$name,$phone,$address);
        if($userData['success']){
            $resData['message']='пльзователь успешно зарегистрирован';
            $resData['success']=1;

            $userData=$userData[0];
            $resData['userName']=$userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail']=$userData['email'];

            $_SESSION['user']=$userData;
            $_SESSION['user']['displayName']=$userData['name'] ? $userData['name'] : $userData['email'];

        }else{
            $resData['success']=0;
            $resData['message']='Ошибка регистрации';
        }
    }
    echo json_encode($resData);

}

/**
 * Разлогинивание пользователя
 */

function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        echo json_encode(1);
    }
}

/**
 * AJAX authorization user
 */
function loginAction($dbh){
    $email=isset($_REQUEST['loginEmail']) ? $_REQUEST['loginEmail'] : null;
    $email=trim($email);

    $pwd=isset($_REQUEST['loginPwd']) ? $_REQUEST['loginPwd'] : null;
    $pwd=trim($pwd);

    $userData=loginUser($dbh,$email,$pwd);

    if($userData['success']){
        $userData=$userData[0];

        $_SESSION['user']=$userData;
        $_SESSION['user']['displayname']=$userData['name'] ? $userData['name'] : $userData['email'];

        $resData=$_SESSION['user'];
        $resData['success']=1;

    }else{
        $resData['success']=0;
        $resData['message']='Неверный логин или пароль';
    }

    echo json_encode($resData);

}

/**
 * @param $dbh
 * @param $smarty
 * Страница пользователя
 */
function indexAction($dbh,$smarty){
    if(!isset($_SESSION['user'])){
        redirect('/');
    }
    //получаем список переменных
    $categories=getAllMainCatsWithChildren($dbh);

    $smarty->assign('pageTitle','страница пользователя');
    $smarty->assign('rsCategories',$categories);
    $smarty->assign('arUser',$_SESSION['user']);

    loadTemplate($smarty,'header');
    loadTemplate($smarty,'user');
    loadTemplate($smarty,'footer');
}

/**
 * @param $dbh
 * Обновление данных пользователя
 * Возвращает json массив
 */
function updateAction($dbh){
    if(!isset($_SESSION['user'])){
        redirect('/');
    }

    //инициализация переменных

    $resData=[];

    $phone=isset($_REQUEST['phone'])? $_REQUEST['phone'] : null;
    $address=isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $name=isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $pwd1=isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2=isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $curPwd=isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;

    $curPwdMD5=md5($curPwd);
    if(!$curPwd || ($_SESSION['user']['pwd']!=$curPwdMD5)){
        $resData['success']=0;
        $resData['message']='Текущий пароль не верный';
        echo json_encode($resData);
        return false;
    }
    //обновление данных пользователя
    $res=updateUserData($dbh,$name,$phone,$address,$pwd1,$pwd2,$curPwdMD5);

    if($res){
        $resData['success']=1;
        $resData['message']='Данные сохранены';
        $resData['name']=$name;

        $_SESSION['user']['name']=$name;
        $_SESSION['user']['phone']=$phone;
        $_SESSION['user']['address']=$address;
        $newPwd=$_SESSION['user']['pwd'];
        if($pwd1 && ($pwd1==$pwd2)){
            $newPwd=md5(trim($pwd1));
        }
        $_SESSION['user']['pwd']=$newPwd;
        $_SESSION['user']['displayName']=$name ? $name : $_SESSION['user']['email'];
    }else{
        $resData['success']=0;
        $resData['message']='Ошибка сохранения';
    }
    echo json_encode($resData);
}