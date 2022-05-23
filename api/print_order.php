<?php
// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        // get all orders
        $page = input("get.page");
        $limit = input("get.limit");

        $start = $page * $limit - $limit;
        $sql = "SELECT * FROM print_orders order by id desc limit {$start},{$limit}";
        $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        jsonResponse(0, "success", $result);

        break;
    case "POST":
        // parse param
        $data = input("post.");

        $data["size"] = json_encode($data["size"]);

        $keys = array_keys($data);
        $values = array_values($data);

        $key = implode("`,`", $keys);
        $value = implode("','", $values);

        // write order data to mysql
        $sql = "INSERT INTO print_orders (`{$key}`) VALUES ('{$value}')";

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

