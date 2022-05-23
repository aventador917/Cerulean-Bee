<?php
//session
session_start();

//encoding
header("Content-type:text/html;charset=utf-8");

$user='root';  //username
$pass='';  //password
$dsn="mysql:host=127.0.0.1:3308;dbname=bee";



try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit ("Error!: " . $e->getMessage() . "<br/>");
}

function filter(&$value) {
    $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// get & post data
function input($str) {
    $pos = strrpos($str, '.', -1);
    if ($pos === false) {
        return false;
    }
    $type = substr($str, 0, $pos);
    $param = substr($str, $pos + 1);
    switch (strtoupper($type)) {
        case 'GET':
            if ($param != '') {
                $result_set = isset($_GET[$param]) ? $_GET[$param] : null;
            } else {
                $result_set = $_GET;
            }
            break;
        case 'POST':
            // read from php://input
            if (count($_POST) == 0) {
                $_POST = json_decode(file_get_contents('php://input'), true);
            }
            if ($param != '') {
                $result_set = isset($_POST[$param]) ? $_POST[$param] : null;
            } else {
                $result_set = $_POST;
            }
            break;
        default:
            return false;
    }
    if (is_array($result_set)) {
        array_walk_recursive($result_set, "filter");
    }
    return $result_set;
}

/**
 * json output
 */
function jsonResponse($code = 1, $msg = "fail", $data = []) {
    header('Content-Type:application/json; charset=utf-8');
    $data = json_encode(["code" => $code, "msg" => $msg, "data" => $data]);
    exit($data);
}

/**
 * output
 */
function dump($var, $echo = true, $label = null, $strict = true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    } else {
        return $output;
    }
}
