<?php
// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        // get all orders
        $page = input("get.page");
        $limit = input("get.limit");

        $start = $page * $limit - $limit;
        $sql = "SELECT * FROM orders order by id desc limit {$start},{$limit}";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        jsonResponse(0, "success", $result);

        break;
    case "POST":
        // parse param
        $data = input("post.");

        $data['order_date'] = date("Y-m-d");

        // write order data to mysql
        $sql = "INSERT INTO `orders` (
            `customer`,
            `phone`,
            `email`,
            `discount`,
            `scheduled_print_date`,
            `art_item`,
            `base_color`,
            `vendor`,
            `maximum_colors`,
            `event`,
            `theme`,
            `order_date`
        )
        VALUES
        (
            '{$data['customer']}',
            '{$data['phone']}',
            '{$data['email']}',
            '{$data['discount']}',
            '{$data['scheduled_print_date']}',
            '{$data['art_item']}',
            '{$data['base_color']}',
            '{$data['vendor']}',
            '{$data['maximum_colors']}',
            '{$data['event']}',
            '{$data['theme']}',
            '{$data['order_date']}'
        )";

        // pdo write to mysql
        try {
            $result = $db->exec($sql);
            if ($result) {
                jsonResponse(0, "Success", $result);
            } else {
                jsonResponse(1, "Incorrect Param", $result);
            }
        } catch (PDOException $e) {
            jsonResponse(1, $e->getMessage());
        }
        break;

    case "PUT":
        // parse param
        $id = input("get.id");
        break;

    case "DELETE":
        break;
}

