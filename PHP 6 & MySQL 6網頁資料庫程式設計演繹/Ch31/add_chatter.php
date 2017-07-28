<?php require_once("Connections/function.php"); ?>
<?php 
if (!isset($_SESSION)) {
	session_start();
}

// 沒有聊天者的暱稱與性別資料
if (!isset($_GET['name']) || !isset($_GET['sex'])) {
  header("Location: index.php");
}
?>
<?php 
//-----------------------------------
// 檢查暱稱是否已經存在?
//-----------------------------------

// 聊天者的暱稱
$username = uniDecode(trim($_GET['name']));
// 聊天者的性別
$usersex = uniDecode(trim($_GET['sex']));	
// 聊天者還沒加入
$chatter_exist = false;

// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chatter.xml";

// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chatter.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chatter.xml檔案的根節點
	$root = $dom->documentElement;
				
	// 有聊天者的節點
	if ($root->hasChildNodes())
	{
		// 巡迴每一個聊天者的節點
		foreach ($root->childNodes as $childs)
		{
			// 目前聊天者的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				if ($childs->hasChildNodes())
				{	
					// 巡迴目前聊天者節點的所有子節點		
					foreach ($childs->childNodes as $child)
					{
						// 目前聊天者的子節點是 <name> 
						if ($child->nodeName == "name")
						{	
							// 目前聊天者的子節點是 <name> 的文字等於聊天者的名稱
							if ($child->nodeValue == $username)
							{
								// 聊天者已經存在, 不要再加入
								$chatter_exist = true;
								break;
							}
						}
					}
				}
						
				// 聊天者已經存在, 不要再加入
				if ($chatter_exist) {
					break;
				}
			}
		}
	}
}

//-----------------------------------
// 暱稱已經存在, 返回
//-----------------------------------
	
if ($chatter_exist) {
	echo "exist";
	exit;
}
			
//-----------------------------------------------------------
// 聊天者還沒加入, 在chatter.xml內插入一個節點來建立聊天者的資料
//-----------------------------------------------------------

// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chatter.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chatter.xml檔案的根節點
	$root = $dom->documentElement;
	
	// 建立新的 <chatter> 節點
	$chatter = $dom->createElement("chatter");
	$root->insertBefore($chatter, $root->firstChild);
			
	// 建立 <chatter> 節點的子節點 <name>
	$name = $dom->createElement("name");
	$name->nodeValue = $username;
	$chatter->insertBefore($name, $chatter->firstChild);
	$_SESSION['name'] = $username;
	setcookie("name", $username, time()+24*3600);
			
	// 建立 <chatter> 節點的子節點 <sex>
	$sex = $dom->createElement("sex");
	$sex->nodeValue = $usersex;
	$chatter->appendChild($sex);
	$_SESSION['sex'] = $usersex;
	setcookie("sex", $usersex, time()+24*3600);
		
	// 聊天者的人數
	if ($_SESSION['sex'] == "男")
		$_SESSION['man_count']++;
	else
		$_SESSION['woman_count']++;
			
	$_SESSION['total_count']++;

	// 儲存 XML 文件 chatter.xml
	$dom->save($filename);
}
			
//-----------------------------------------------------------
// 聊天者還沒加入, 在chat.xml內插入一個節點來建立聊天者的資料
//-----------------------------------------------------------

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
	$name->nodeValue = $username;
	$chat->appendChild($name);
		
	// 建立 <chat> 節點的子節點 <color>
	$color = $dom->createElement("color");
	$color->nodeValue = 1;
	$chat->appendChild($color);
	
	// 建立 <chat> 節點的子節點 <who>
	$who = $dom->createElement("who");
	$who->nodeValue = "所有人";
	$chat->appendChild($who);
	
	// 建立 <chat> 節點的子節點 <speech>
	$speech = $dom->createElement("speech");
	$speech->nodeValue = "進入聊天室 努力聊天中";
	$chat->appendChild($speech);
	
	// 建立 <chat> 節點的子節點 <time>
	$time = $dom->createElement("time");
	$time->nodeValue = date("Y-m-d H:i:s");
	$chat->appendChild($time);
	
	// 儲存 XML 文件 chat.xml
	$dom->save($filename);
}
				
//---------------------------------------------------------------
// 聊天者還沒加入, 在chatter_count.xml內插入一個節點來更改聊天者的人數
//---------------------------------------------------------------
	
// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chatter_count.xml";

// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chatter_count.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chatter_count.xml檔案的根節點
	$root = $dom->documentElement;

	if ($root->hasChildNodes())
	{
		// 巡迴每一個節點
		foreach ($root->childNodes as $childs)
		{
			// 目前的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				// 目前的子節點是 <total> 
				if ($childs->nodeName == "total")
				{			
					// 所有登入者的總數
					$count = $childs->nodeValue;
					$childs->nodeValue = $count + 1;
				}
				else if ($childs->nodeName == "man")
				{			
					// 男登入者的總數
					if ($usersex == "男")
					{
						$count = $childs->nodeValue;
						$childs->nodeValue = $count + 1;
					}
				}
				else if ($childs->nodeName == "woman")
				{			
					// 女登入者的總數
					if ($usersex == "女")
					{
						$count = $childs->nodeValue;
						$childs->nodeValue = $count + 1;
					}
				}
			}
		}
	}
	
	// 儲存 XML 文件 chatter_count.xml
	$dom->save($filename);
}

//--------------------------
// 成功
//--------------------------

echo "success";
?>