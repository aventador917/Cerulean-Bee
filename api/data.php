<?php

// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        try {

            $order_id = input("get.id");

            // get order data
            $sql = "SELECT * FROM print_orders where id = {$order_id}";
//            echo $sql;exit;
            $order_data = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

            // get item data
//            $sql = "SELECT * FROM items where order_id = {$order_id}";
//
//            $item_data = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $data = [
                "order" => $order_data,
                "items" => json_decode($order_data["size"])
            ];

            jsonResponse(0, "success", $data);
        } catch (Exception $e) {
            jsonResponse(1, $e->getMessage());
        }
        break;

    case "POST":
        // create data
        break;

    case "PUT":
        // put data
        break;

    case "DELETE":
        // delete data
        break;
}

