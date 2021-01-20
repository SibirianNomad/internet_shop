<?php
/**
 * Model for table users
 */


/**
 * Register new user
 * @param $dbh
 * @param $email
 * @param $pwd
 * @param $name
 * @param $phone
 * @param $address
 *
 */
    function registerNewUser($dbh,$email,$pwd,$name,$phone,$address){
        $result=$dbh->query("INSERT INTO users (email,pwd,name,phone,address) VALUES('$email','$pwd','$name','$phone','$address')");

        if($result){
            $record=$dbh->query("SELECT * FROM users WHERE email='$email' and pwd='$pwd' LIMIT 1");
            $rs=createRsArraySmarty($record);
            if(isset($rs[0])){
                $rs['success']=1;
            }else{
                $rs['success']=0;
            }
        }else{
            $rs['success']=0;
        }
        return $rs;
    }

/**
 * @param $email
 * @param $pwd1
 * @param $pwd2
 * Проверка параметров для регистрации пользователей
 */
    function checkRegisterParams($email,$pwd1,$pwd2){

        $res=null;

        if(!$email){
            $res['success']=false;
            $res['message']='Введите email';
        }
        if(!$pwd1){
            $res['success']=false;
            $res['message']='Введите пароль';
        }
        if(!$pwd2){
            $res['success']=false;
            $res['message']='Введите повтор пароля';
        }
        if($pwd1!=$pwd2){
            $res['success']=false;
            $res['message']='Пароли не совпадают';
        }
        return $res;
    }

/**
 * @param $dbh
 * @param $email
 * Проверка есть ли такой email в БД
 */
    function checkUserEmail($dbh,$email){

        $record=$dbh->query("SELECT id FROM users WHERE email='$email'");

        return createRsArraySmarty($record);
    }

/**
 * @param $email
 * @param $pwd
 * Проверка почты и пароля пользлвателя
 */

    function loginUser($dbh,$email,$pwd){
        $pwdMD5=md5($pwd);
        $record=$dbh->query("SELECT * FROM users WHERE email='$email' and pwd='$pwdMD5' LIMIT 1");
        $rs=createRsArraySmarty($record);

        if(isset($rs[0])){
            $rs['success']=1;
        }else{
            $rs['success']=0;
        }
        return $rs;
    }

/**
 * @param $name
 * @param $phone
 * @param $address
 * @param $pwd1
 * @param $pwd2
 * @param $curPwd
 * Изменение данных пользователя
 */
    function updateUserData($dbh,$name,$phone,$address,$pwd1,$pwd2,$curPwd){

        $pwd1=trim($pwd1);
        $pwd2=trim($pwd2);
        $email=$_SESSION['user']['email'];

        $newPwd=null;

        if($pwd1){
            if($pwd1==$pwd2){
                $newPwd=md5($pwd1);
            }else{
                return false;
            }
        }
        $sql="UPDATE users SET ";
        if($newPwd){
            $sql.=" pwd='$newPwd', ";
        }
        $sql.="name='$name', phone='$phone', address='$address' WHERE email='$email' AND pwd='$curPwd'";

        $rs=$dbh->query($sql);


        return $rs;
    }