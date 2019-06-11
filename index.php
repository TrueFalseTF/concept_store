<?php	
    require_once("function.php");
    require_once("database.php");

    $link = db_connect();

    $position_catalogue = position_generator($link, "product_catalog"); 

    $position_basket = position_generator($link, "users_basket");
    
    #переименование таблицы корзины БД при заказе

    #отправка email владельцу магазина     

    include("pages/catalogue.php");
    
    if($_GET["changing_user_basket"]){
        add_position_basket($link, $_GET["changing_user_basket"]);
    }
?>