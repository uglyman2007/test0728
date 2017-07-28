<?php require_once("Connections/function.php"); ?>
<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php 
if (isset($_GET['name']) && isset($_GET['speech']))
{
	// XML檔案
	$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chat.xml";

	// XML檔案存在
	if (file_exists($filename))
	{
		// 載入 XML 文件 chat.xml
		$dom = new DOMDocument();
		$dom->load($filename);
		// chat.xml檔案的根節點
		$root = $dom->documentElement;
					
		// 建立新的 <chat> 節點
		$chat = $dom->createElement("chat");
		$root->appendChild($chat);
					
		// 建立 <chat> 節點的子節點 <name>
		$name = $dom->createElement("name");
		$name->nodeValue = uniDecode(trim($_GET['name']));
		$chat->appendChild($name);
					
		// 建立 <chat> 節點的子節點 <color>
		$color = $dom->createElement("color");
		$color->nodeValue = uniDecode(trim($_GET['color']));
		$chat->appendChild($color);
		
		// 建立 <chat> 節點的子節點 <who>
		$who = $dom->createElement("who");
		$who->nodeValue = uniDecode(trim($_GET['who']));
		$chat->appendChild($who);
		
		// 建立 <chat> 節點的子節點 <speech>
		$speech = $dom->createElement("speech");
		$speech->nodeValue = uniDecode(trim($_GET['speech']));
		$chat->appendChild($speech);
		
		// 建立 <chat> 節點的子節點 <time>
		$time = $dom->createElement("time");
		$time->nodeValue = date("Y-m-d H:i:s");
		$chat->appendChild($time);
	
		// 儲存 XML 文件 chat.xml
		$dom->save($filename);
	}
}

echo "OK";
?>