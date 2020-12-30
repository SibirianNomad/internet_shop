/**
 * Add product to basket
 * @param itemId
 */
    function addToCart(itemId){
        $.ajax({
            type:"POST",
            async:false,
            url:"/cart/addtocart/"+itemId+"/",
            dataType:'json',
            success:function (data) {
                if(data['success']){
                    $('#cartCntItems').html(data['cntItems']);
                    $('#addCart_'+itemId).hide();
                    $('#removeCart_'+itemId).show();
                }
            }
        })
    }
    function removeFromCart(itemId){
        $.ajax({
            type:"POST",
            async:false,
            url:"/cart/removefromcart/"+itemId+"/",
            dataType:'json',
            success:function (data) {
                if(data['success']){
                    $('#addCart_'+itemId).show();
                    $('#removeCart_'+itemId).hide();
                    if(data['cntItems']==0){
                        $('#cartCntItems').html('Пусто');
                    }else{
                        $('#cartCntItems').html(data['cntItems']);
                    }
                }
            }
        })
    }
    function conversionPrice(id){
        var value=$('#itemCnt_'+id).val();
        var totalPrice=Number($('#itemPrice_'+id).html())*value;
        $('#itemRealPrice_'+id).html(totalPrice);
    }
    function showRegisterBox(){
        if($('#registerBoxHidden').css('display')=='none'){
            $('#registerBoxHidden').show();
        }else{
            $('#registerBoxHidden').hide();
        }
    }

/**
 * Получение данных с формы
 */
function getData(object_form){
    var hData={};
    $('input, textarea, select', object_form).each(function () {
        if(this.name && this.name!=''){
            hData[this.name]=this.value;
        }
    });
    return hData;
}

/**
 * Регистрация нового пользователя
 */
function registerNewUser(){
        var postData=getData('#registerBox');
        $.ajax({
            type:'POST',
            async:false,
            url:"/user/register/",
            data:postData,
            dataType:'json',
            success:function (data){
                if(data['success']){
                    alert('Регитсрация прошла успешно');
                    //>блок в левом столбце
                    $('#registerBox').hide();

                    $('#userLink').attr('href','/user/');
                    $('#userLink').html(data['userName']);
                    $('#userBox').show();

                    //>страница заказа
                    // $('#loginBox').hide();
                    // $('#btnSaveOder').show();

                }else{
                    alert(data['message']);
                }
            }
        })
    }

    function logout(){
    $.ajax({
        type:'POST',
        async:false,
        url:"/user/logout/",
        success:function (data){
            if(data){
                window.location.href = "/";
            }
        }
    })
    }
    function login(){
        var postData=getData('#loginBox');
        $.ajax({
            type:'POST',
            async:false,
            url:"/user/login/",
            data:postData,
            dataType:'json',
            success:function (data){
                if(data['success']){
                   $('#registerBox').hide();
                   $('#loginBox').hide();

                    $('#userLink').attr('href','/user/');
                    $('#userLink').html(data['displayname']);
                    $('#userBox').show();

                }else{
                    alert(data['message']);
                }
            }
        })
    }
    function updateUserData(){
        var name=$('#newName').val();
        var phone=$('#newPhone').val();
        var pwd1=$('#newPwd1s').val();
        var pwd2=$('#newPwd2').val();
        var curPwd=$('#curPwd').val();
        $.ajax({
            type:'POST',
            async:false,
            url:"/user/update/",
            dataType:'json',
            data: {
                name:name,
                phone:phone,
                pwd1:pwd1,
                pwd2:pwd2,
                curPwd:curPwd
            },
            success:function () {

            }
        });
    }
