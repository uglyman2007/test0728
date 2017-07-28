<?php require_once("Connections/function.php"); ?>
<?php
if (isset($_GET['dir']) && isset($_GET['file'])) 
{
	// 刪除檔案所在的資料夾
	$dir = uniDecode(trim($_GET['dir']));
	// 將 utf-8 轉換成 big5
	$dir = iconv("utf-8", "big5", $dir);
	
	// 刪除檔案的名稱
	$file = uniDecode(trim($_GET['file']));
	// 將 utf-8 轉換成 big5
	$file = iconv("utf-8", "big5", $file);
	
	// 刪除檔案的完整路徑
	if (!empty($dir)) {
		$delete_file = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $dir . "/" . $file;
	}
	else {
		$delete_file = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $file;
	}
			
	if (file_exists($delete_file))
		unlink($delete_file);
		
	header("Location: index.php");
}
?>