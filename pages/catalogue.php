<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">    
    <title>Магазин</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./pages/css/styles.css">
</head>
<body>    
    <!--product table-->    
    <!--таблица-->
    
    <table class="table product_table">
        <caption>Каталог магазина</caption>
        <tr>
            <th>№</th><th>Продукт</th><th>Цена</th><th>-</th><th>+</th><th>В корзине</th>
        </tr>
        <?php foreach($position_catalogue as $row): ?>
            <tr>
                <th><?=$row["id"]?></th>

                <th><?=$row["product"]?></th>

                <th id="price_<?=$row["id"]?>"><?=$row["price"]?></th>
                
                <th>
                    <input class="button" type="button" onclick="changing_user_basket(<?=$row['id']?>, 'subtract'); 
                    CLIENT_changing_user_basket(<?=$row['id']?>, 'subtract');" value="-">
                </th>

                <th>
                    <input class="button" type="button" onclick="changing_user_basket(<?=$row['id']?>, 'add'); 
                    CLIENT_changing_user_basket(<?=$row['id']?>, 'add');" value="+">
                </th>                

                <th id="<?=$row['id']?>"><?=$row["amount_product"]?></th>
            </tr>
        <?php endforeach ?>
    </table>
        

    <!--банер корзины-->

    <div class="basket">
        <a href="index.php?open_basket">Корзина</a><br>
        <?php $total_basket = 0;  $total_price = 0;
            foreach($position_catalogue as $row) {
                
            $total_basket += $row["amount_product"];
            $total_price += $row["price"] * $row["amount_product"];
        } ?>
        <span>Всего в корзине: </span><span id="in_total_basket"><?=$total_basket?></span><br>
        <span>Общая стоимость: </span><span id="in_total_price"><?=$total_price?></span><br>
        <input type="button" onclick="clean_user_basket(); 
            CLIENT_clean_user_basket(<?=array_pop($position_catalogue)['id']?>);" value="Очистить корзину">          
    <div>

    
</body>
<script src="./pages/js/engine.js"></script>
</html>