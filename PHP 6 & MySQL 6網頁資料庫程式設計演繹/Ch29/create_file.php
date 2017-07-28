<?php
if (!isset($_SESSION)) {
  session_start();
}
// 網頁擁有者
if (!isset($_SESSION['owner'])) {
	$_SESSION['owner'] = "BlogOwner";
}
?>
<?php
// 如果網頁擁有者的資料夾不存在, 就建立網頁擁有者的資料夾
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
if (!file_exists($dirname))
	mkdir($dirname);
		
// 如果 paper.xml 不存在, 就建立 paper.xml 檔案
$filename = $dirname . "/paper.xml";
if (!file_exists($filename))
{
	// 開啟 paper.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// paper.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><papers></papers>");
		}
	}
}
				
// 如果 photo.xml 不存在, 就建立 photo.xml 檔案
$filename = $dirname . "/photo.xml";
if (!file_exists($filename))
{
	// 開啟 photo.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// photo.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><photos></photos>");
		}
	}
}
			
// 如果 message.xml 不存在, 就建立 message.xml 檔案
$filename = $dirname . "/message.xml";
if (!file_exists($filename))
{
	// 開啟 message.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// message.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><messages></messages>");
		}
	}
}
?>