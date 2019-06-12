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

    function add_position_basket($link, $added_position_id, $added_position_sign) {

        if($added_position_sign === "+") {

            $query = "SELECT * FROM product_catalog WHERE id=".$added_position_id;
            $result_add = mysqli_query($link, $query);
    
            if (!$result)
                die(mysqli_error($link));    
            
            $position =  array();            
            
            $row = mysqli_fetch_assoc($result_add);
            $position_add[] = $row;            

            $query = "INSERT INTO users_basket (id, product, price, amount_product) VALUES (".$position_add['id'].", ".$position_add['product'].", ".$position_add['price'].", ".$position_add['amount_product'].")" ;
        /*} else if ($added_position.sign === "-") {
            $query = "удалить из users_basket $added_position";*/
        };        

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));
    };
?>