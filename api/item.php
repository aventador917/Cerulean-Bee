<?php
// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        // get all item
        try {
            // get all orders
            $page = input("get.page");
            $limit = input("get.limit");
            $order_id = input("get.order_id");

            $start = $page * $limit - $limit;
            $sql = "SELECT * FROM items where order_id = '{$order_id}' order by id desc limit {$start},{$limit}";
            $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            jsonResponse(0, "success", $result);
        } catch (Exception $e) {
            jsonResponse(1, $e->getMessage());
        }
        break;
    case "POST":
        // pdo write to mysql
        try {
            // parse param
            $data = input("post.");

//            dump($data);exit();

            foreach ($data['item'] as $key => $value) {
                // write item data to mysql
                $sql = "INSERT INTO `items` ( `order_id`, `size`, `number`, `vendor`, `base_price`, `charge_price`, `unit`, `cost` )
            VALUES
                    (
                        '{$data['order_id']}',
                        '{$value['size']}',
                        '{$value['number']}',
                        '{$value['vendor']}',
                        '{$value['base_price']}',
                        '{$value['charge_price']}',
                        '{$value['unit']}',
                        '{$value['cost']}'
                    )";

//                echo $sql; exit();
                $result = $db->exec($sql);

                $item_id = $db->lastInsertId();

                // write item_detail data to mysql
                foreach ($data['position'] as $k => $v) {
                    $sql = "INSERT INTO `positions` ( `order_id`,`item_id` ,`position`, `description` )
                VALUES
                        (
                            '{$data['order_id']}',
                            '{$item_id}',
                            '{$v['position']}',
                            '{$v['description']}'
                        )";

                    $pos_res = $db->exec($sql);

                    $pos_id = $db->lastInsertId();

                    //write colors data to mysql
                    foreach ($v['colors'] as $i => $p) {
                        $sql = "INSERT INTO `colors` ( `order_id`,`item_id` ,`pos_id` ,`color` ,`cost`,`charge`  )
                    VALUES
                            (
                                '{$data['order_id']}',
                                '{$item_id}',
                                '{$pos_id}',
                                '{$p['color']}',
                                '{$p['cost']}',
                                '{$p['charge']}'
                            )";

                        $col_result = $db->exec($sql);
                    }
                }

            }

            jsonResponse(0, "Success", $result);
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

