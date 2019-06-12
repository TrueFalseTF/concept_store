<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">    
    <title>Магазин</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./pages/css/shopping_basket_styles.css">    
</head>
<body>    
    <table class="product_table">
        <caption>Корзина</caption>
        <tr>
            <th>№</th><th>Продукт</th><th>Цена</th><th>-</th><th>+</th>
        </tr>
        <?php foreach($position_basket as $row): ?>
            <tr>
                <th><?=$row["id"]?></th>

                <th><?=$row["product"]?></th>

                <th><?=$row["price"]?></th>                

                <th id="<?=$row['id']?>"><?=$row["amount_product"]?></th>
            </tr>
        <?php endforeach ?>
    </table>   
</body>
<script src="./pages/js/shopping_basket.js"></script>
</html>