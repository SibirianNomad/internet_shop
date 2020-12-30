{*Left column*}
<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
        {foreach $rsCategories  as $item}
           <a href="/category/{$item['id']}/"> {$item['name']}</a><br>
            {if isset($item['children'])}
                {foreach $item['children']  as $children}
                    --<a href="/category/{$children['id']}/"> {$children['name']}</a><br>
                {/foreach}
            {/if}
        {/foreach}
    </div>
    {if isset($arUser)}
    <div id="userBox">
        <a href="/user/" id="userLink">{$arUser['displayname']}</a>
        <a href="#" onclick="logout();">Выход</a>
    </div>
    {else}
    <div id="loginBox">
        <div class="menuCaption">Авторизация</div>
        <input type="text" id="loginEmail" name="loginEmail" value=""/><br>
        <input type="password" id="loginPwd" name="loginPwd" value=""/><br>
        <input type="submit" onclick="login()" value="Войти"/>
    </div>

    <div id="registerBox">
        <a href="#" class="menuCaption showHidden" onclick="showRegisterBox()">Регистрация</a>
        <div id="registerBoxHidden" style="display: none">
            email<br>
            <input type="text" id="email" name="email" value=""/>
            Пароль<br>
            <input type="password" id="pwd1" name="pwd1" value=""/>
            Повторить пароль<br>
            <input type="password" id="pwd2" name="pwd2" value=""/>
            <input type="button" onclick="registerNewUser();" value="Зарегистрироваться"/>
        </div>
    </div>
    {/if}
    <div class="menuCaption">Корзина</div>
    <a href="/cart/" title="Перейти в корзину">В корзину</a>
    <span id="cartCntItems">
        {if $cartCntItems>0}{$cartCntItems}{else}Пусто{/if}
    </span>
</div>
