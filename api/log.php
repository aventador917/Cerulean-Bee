<?php
// import config
require_once "config.php";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        try {
            // get all orders
            $page = input("get.page");
            $limit = input("get.limit");
            $order_id = input("get.id");
            $user_id = input("get.uid");

            if($order_id){
                $sql = "SELECT w.*,u.name as username,u.salary,TIMESTAMPDIFF(HOUR,start_time,end_time) as use_time FROM worklogs w 
                left join user u on u.id = w.uid where project_id = '{$order_id}'  order by id desc";
            }else{
                if($user_id){
                    $start = $page * $limit - $limit;
                    $sql = "SELECT w.*,u.name as username FROM worklogs w left join user u on u.id = w.uid where w.uid= '{$user_id}' order by id desc limit {$start},{$limit}";
                }else{
                    $start = $page * $limit - $limit;
                    $sql = "SELECT w.*,u.name as username FROM worklogs w left join user u on u.id = w.uid  order by id desc limit {$start},{$limit}";
                }
            }

            $result = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            jsonResponse(0, "success", $result);
        } catch (Exception $e) {
            jsonResponse(1, $e->getMessage());
        }
        break;

    case "POST":
        try {
            // pdo write to mysql
            $data = input("post.");

            $data['create_date'] = date("Y-m-d");

            // write order data to mysql
            $sql = "INSERT INTO `worklogs` (`uid`, `start_time`, `end_time`, `project_id`, `art_project`, `task`, `create_date` )
        VALUES
        (
            '{$data['uid']}',
            '{$data['start_time']}',
            '{$data['end_time']}',
            '{$data['project_id']}',
            '{$data['art_project']}',
            '{$data['task']}',
            '{$data['create_date']}'
        )";

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

