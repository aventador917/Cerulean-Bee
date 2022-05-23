<?php
// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        break;

    case "POST":
        try {
            // pdo write to mysql
            $data = input("post.");

            $id = $data["id"];

            $sql = "select * from art_orders where id = $id";

            $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

            $result["position"] = json_decode($result["position"], true);

            $result["position"][] = $data;

            $json = json_encode($result["position"]);

            // write order data to mysql
            $sql = "update art_orders set position = '$json' where id = '$id'";

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
        break;

    case "DELETE":
        break;
}

