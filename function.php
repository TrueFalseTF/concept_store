<?php
    function position_generator($link) {

        $query = "SELECT * FROM product_catalog";
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

?>