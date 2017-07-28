<?php				
//-------------------------------------------------
// 如果 chatter.xml 不存在, 就建立 chatter.xml 檔案
//-------------------------------------------------

// 如果xml資料夾不存在, 就建立xml資料夾
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
if (!file_exists($dirname))
	mkdir($dirname);

// 如果 chatter.xml 不存在, 就建立 chatter.xml 檔案
$filename = $dirname . "/chatter.xml";
if (!file_exists($filename))
{
	// 開啟 chatter.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// chatter.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><chatters></chatters>");
		}
	}
}

// 如果 chat.xml 不存在, 就建立 chat.xml 檔案
$filename = $dirname . "/chat.xml";
if (!file_exists($filename))
{
	// 開啟 chat.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// chat.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><chats></chats>");
		}
	}
}

// 如果 chatter_count.xml 不存在, 就建立 chatter_count.xml 檔案
$filename = $dirname . "/chatter_count.xml";
if (!file_exists($filename))
{
	// 開啟 chatter_count.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// chatter_count.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><chatters><total>0</total><man>0</man><woman>0</woman></chatters>");
		}
	}
}
?>