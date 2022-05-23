<?php
// import config
require_once "config.php";

// parse param
$name = input("post.name");

$password = input("post.password");

if (!empty($name) && !empty($password)) {
    // search data from database
    $sql = "select * from user where name = '{$name}' and password = md5('{$password}')";
    $result = $db->query($sql)->fetch();
    if ($result) {
        $token = md5(time() . $result["id"]);
        jsonResponse(0, "Success", $result);
    } else {
        jsonResponse(1, "Incorrect nickname or password");
    }
} else {
    jsonResponse(1, "Please fill in your nickname and password");
}