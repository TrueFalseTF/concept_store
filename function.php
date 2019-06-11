<?php
    function position_generator($link, $table) {

        $query = "SELECT * FROM ".$table;
        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        $n = mysqli_num_rows($result);
        $position =  array();

        for ($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $position[] = $row;
        }

        return $position;
    }

    function add_position_basket($link, $added_position) {

        if($added_position.sign === "+") {
            $query = "INSERT INTO users_basket (id, product, price, amount_product) SELECT $added_position.id, Address, City, Seller_name, Country FROM product_catalog";
        } else if ($added_position.sign === "-") {
            $query = /*"удалить из users_basket $added_position"*/;
        };        

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));
    }
?>