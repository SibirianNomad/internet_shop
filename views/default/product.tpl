{* product page*}
    <h3>{$rsProduct['name']}</h3>

    <img width="575" src="/images/products/{$rsProduct['image']}">
    Стоимость: {$rsProduct['price']}

        <a style="display:{if !$itemInCart }none{/if}" id="removeCart_{$rsProduct['id']}" href="#" onclick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>

        <a style="display:{if $itemInCart }none{/if}" id="addCart_{$rsProduct['id']}" href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>

    <p>Описание <br>{$rsProduct['description']}</p>