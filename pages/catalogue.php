<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">    
    <title>Магазин</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/shopping_basket_styles.css">
    <script src="./pages/js/catalogue.js"></script>
    <script src="./pages/js/shopping_basket.js"></script>
</head>
<body>    
    <!--product table-->    
    <!--таблица-->
    <form action="">
        <table class="product_table">
            <caption>Каталог магазина</caption>
            <tr>
                <th>№</th><th>Продукт</th><th>Цена</th><th>-</th><th>+</th>
            </tr>
            <?php foreach($position as $row): ?>
                <tr>
                    <th name=<?=$row["id"]?>><?=$row["id"]?></th>

                    <th><?=$row["product"]?></th>

                    <th name=<?=$row["price"]?>><?=$row["price"]?></th>

                    <th><input type="button" value="-"></th><th><input type="button" value="+"></th>
                </tr>
            <?php endforeach ?>
        </table>
    </form>    

    <!--банер корзины-->
    <div><!--outpute-->
        <a href="./pages/shopping_basket.php">Корзина</a>
    <div>
    
</body>
</html>