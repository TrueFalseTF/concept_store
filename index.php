<?php	
    require_once("function.php");
    require_once("database.php");

    $link = db_connect();

    $position_catalogue = position_generator($link, "product_catalog"); 

    $position_basket = position_generator($link, "users_basket");
    
    #обновление 4 столбца главной таблицы БД кол-во в карзине при перезагрузке

    #обновление 4 столбца главной таблицы БД кол-во в карзине при заказе

    #переименование таблицы корзины БД при заказе создание новой пользовательской;

    #отправка email владельцу магазина 

    if(isset($_GET["open_basket"])) {
        include("pages/shopping_basket.php");                
    } else {        
        if(isset($_GET["changing_user_basket"])){
            header(200);
            changing_position_basket($link, $_GET["id"], $_GET["sign"]);
        };
        include("pages/catalogue.php");
    }    
?>