{*страница категории*}

    <h1>{$pageTitle}</h1>
    {if $rsProducts!=null}
        {foreach $rsProducts as $item name=products}
            <div style="float: left;padding: 0 30px 40px 0;">
                <a href="/product/{$item['id']}">
                    <img src="/images/products/{$item['image']}" width="100" height="100">
                </a><br>
                <a href="/product/{$item['id']}/">{$item['name']}</a>
            </div>
            {if $smarty.foreach.products.iteration mod 3===0}
                <div style="clear: both"></div>
            {/if}
        {/foreach}
    {else}
        <div>Товаров данной категории нет</div>
    {/if}
    <div style="clear: both"></div>
    {foreach $rsChildren as $item name=childCats}
        <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
    {/foreach}