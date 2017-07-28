<?php
// 啟動Session
session_start();

echo "被害用戶的 Session ID 是 : " . session_id() . "<br />";
echo "被害用戶的 username 是 : " . $_SESSION["username"] . "<br />";
echo "被害用戶的 password 是 : " . $_SESSION["password"] . "<br />";

// 將book商品的數量設定為2000
$_SESSION["book"] = 2000;
?>