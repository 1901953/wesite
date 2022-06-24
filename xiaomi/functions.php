<?php
// session_start（） 根据通过 GET 或 POST 请求传递或通过 Cookie 传递的会话标识符创建会话或恢复当前会话。当调用session_start（） 或会话自动启动时，PHP 将调用打开和读取会话保存处理程序。

//  if session has been checked that the  user_id is existed, that will be redirection to login.php
function check_login($conn)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];

        $query = "SELECT * FROM `users` WHERE user_id = '$id'  limit 1";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("Location: login.php");
    die;
}




function random_num($length)
{
    // text="" 是一個用來裝數字用的
    $text = "";
    // 用來判斷：如果length是小於 5 的話，就當length（長度）為5
    if ($length < 5) {
        $length = 5;
    }

    //signup.php裏面 （第15行：$user_id = random_num(20);）  隨機產生 4 -20位數字，用作user_id的長度。
    $len = rand(4, $length);

    // 隨機產生 0-9位 數字 來填滿  user_id的長度
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}
