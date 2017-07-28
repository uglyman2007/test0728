<?php
// 檢查上傳檔案欄位是否存在
if (isset($_FILES['file'])) 
{	
	// 上傳檔案存放的資料夾
	$upload_dir = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_POST['select_dir'];
	
	// 共有11個上傳檔案欄位
	for ($i = 0; $i < 11; $i++)
	{
		if (!empty($_FILES['file']['name'][$i]))
		{ 
			// 要放在網站資料夾中的完整路徑，包含檔名, 將 utf-8 轉換成 big5
			$upload_file = $upload_dir  . "/" . $_FILES['file']['name'][$i];
			// 將伺服器儲存的暫時檔案,移動到真實檔案名稱, 將 utf-8 轉換成 big5
			move_uploaded_file($_FILES['file']['tmp_name'][$i], iconv("utf-8", "big5", $upload_file));
		}
	}
}

// 回到index.php
header('Location: index.php');
?>