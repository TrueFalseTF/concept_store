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

    function changing_position_basket($link, $changing_position_id, $changing_position_sign) {

        if($changing_position_sign === "add") {
            
            $result_add = mysqli_query($link, 
                "SELECT * FROM product_catalog WHERE id=".$changing_position_id);    
            if (!$result_add)
                die(mysqli_error($link));

            $result_added = mysqli_query($link, 
                "SELECT * FROM users_basket WHERE id=".$changing_position_id);    
            if (!$result_added)
                die(mysqli_error($link));              
                
            
            $row_catalog = mysqli_fetch_assoc($result_add);
            $row_basket = mysqli_fetch_assoc($result_added); 
                
            if (NULL !== $row_basket) {
                $result_added = mysqli_query($link, 
                    "DELETE FROM users_basket WHERE id=".$changing_position_id);    
                if (!$result_added)
                    die(mysqli_error($link));
            }

            
            $row_id = '"'.$row_catalog['id'].'"';
            $row_product = '"'.$row_catalog['product'].'"';
            $row_price = '"'.$row_catalog['price'].'"';
            $row_amount_product = 1;
            if(isset($row_basket['amount_product'])){
                $row_amount_product = $row_basket['amount_product'] + 1;
            }
                              
    
            $query = "INSERT INTO `users_basket` (`id`, `product`, `price`, `amount_product`) VALUES ("
            .$row_id.", "
            .$row_product.", "
            .$row_price.", "
            .$row_amount_product.")" 
            ;

        /*} else if ($changing_position.sign === "-") {
            $query = "удалить из users_basket $changing_position";*/
        };        

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));
    };

?>