<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">    
    <title>Магазин</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./pages/css/catalog_styles.css">
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
            <?php foreach($position_catalogue as $row): ?>
                <tr>
                    <th name=<?="_".$row["id"]?>><?=$row["id"]?></th>

                    <th><?=$row["product"]?></th>

                    <th name=<?="_".$row["price"]?>><?=$row["price"]?></th>

                    <th><input type="button" onclick="changing_user_basket(<?=$row['id']?>, 'subtract');" value="-"></th><th><input type="button" onclick="changing_user_basket(<?=$row['id']?>, 'add');" value="+"></th>

                    <th id=<?=$row["id"]?>></th>
                </tr>
            <?php endforeach ?>
        </table>
    </form>    

    <!--банер корзины-->
    <div><!--outpute-->
        <form method="post" action="index.php?open_basket" >
            <input type="submit" value="Корзина">
            <!--сумма-->
        </form>
    <div>
    
</body>
<script src="./pages/js/catalogue.js"></script>
<script src="./pages/js/shopping_basket.js"></script>
</html>