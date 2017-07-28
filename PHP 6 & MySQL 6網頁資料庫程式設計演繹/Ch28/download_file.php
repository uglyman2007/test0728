<?php require_once("Connections/function.php"); ?>
<?php
if (isset($_GET['dir']) && isset($_GET['file'])) 
{
	// 下載檔案所在的資料夾
	$dir = uniDecode(trim($_GET['dir']));
	// 將 utf-8 轉換成 big5
	$dir = iconv("utf-8", "big5", $dir);
	
	// 下載檔案的名稱
	$file = uniDecode(trim($_GET['file']));
	// 將 utf-8 轉換成 big5
	$file = iconv("utf-8", "big5", $file);
	
	// 下載檔案的完整路徑
	if (!empty($dir)) {
		$download_file = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $dir . "/" . $file;
	}
	else {
		$download_file = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $file;
	}
			
	header('Content-type: application/force-download');
  	header('Content-Transfer-Encoding: Binary');
 	header('Content-Disposition: attachment; filename=' . $file);
  	readfile($download_file);
}
?>