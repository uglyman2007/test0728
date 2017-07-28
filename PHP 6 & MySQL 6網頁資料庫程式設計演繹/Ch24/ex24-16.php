<?php
// 處理使用者傳來的變數
if (!function_exists("GetSQLValueString")) 
{
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
	  	// 將使用者傳來的變數去掉 \ 字元
	  	$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	  	// 處理脫逸字元
	  	$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
		// 處理變數的資料形態
	  	switch ($theType) 
	  	{
    		case "text":
	      		$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
    	  		break;    
		    case "long":
    		case "int":
	    		$theValue = ($theValue != "") ? intval($theValue) : "NULL";
		    	break;
	    	case "double":
		    	$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
	    		break;
    		case "date":
	      		$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
    	  		break;
	    	case "defined":
    	  		$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
	      		break;
  		}
		
	  	return $theValue;
	}
}

// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch24
$db_selected = mysql_select_db('ch24', $link);

// 新會員輸入的帳號
$check_name = "-1";
if (isset($_GET['username'])) {
  $check_name = $_GET['username'];
}

// 查詢新會員輸入的帳號是否已經存在？
$query = sprintf("SELECT username FROM member WHERE username = %s", GetSQLValueString($check_name, "text"));
$result = mysql_query($query) or die(mysql_error());

// 結果集的記錄筆數
$totalRows = mysql_num_rows($result);
// 傳回指定帳號的資料筆數
echo $totalRows;

// 釋放結果集
mysql_free_result($result);
mysql_close($link);
?>