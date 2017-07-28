<?php require_once("FCKeditor/fckeditor.php"); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
//--------------------------------
// 在 message.xml 內插入一則留言
//--------------------------------

// 按下 [送出] 按鈕
if (isset($_POST['insert_message']) && ($_POST['insert_message'] == "post_message") && (!empty($_POST['content'])))
{
	// XML檔案
	$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'] . "/message.xml";

	// XML檔案存在
	if (file_exists($filename))
	{
		// 載入 XML 文件 message.xml
		$dom = new DOMDocument();
		$dom->load($filename);
		// message.xml檔案的根節點
		$root = $dom->documentElement;
			
		// 建立新的 <message> 節點
		$message = $dom->createElement("message");
		$root->insertBefore($message, $root->firstChild);

		// 建立 <message> 節點的子節點 <content>
		$content = $dom->createElement("content");
		$content->nodeValue = htmlspecialchars(trim($_POST['content']), ENT_QUOTES);
		$message->appendChild($content);
		
		// 儲存 XML 文件 message.xml
		$dom->save($filename);
		// 回到前一頁		
		header("Location: " . $_SESSION['PrevPage']);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>發表留言</title>
<link href="CSS/post_message.css" rel="stylesheet" type="text/css" />
<script src="FCKeditor/fckconfig.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="post_message_style1">
    發表留言
  </div>
  <div class="post_message_style2">
    <form method="post">
      <table class="post_message_style3">
        <tr>
          <td class="post_message_style4">
            <?php
			  // 建立FCKeditor的物件
              $editor = new FCKeditor("content");
			  // 指定FCKeditor資料夾的相對路徑
			  $BasePath = $_SERVER['PHP_SELF'];
              $BasePath = substr($BasePath, 0, strpos($BasePath, "post_paper.php"));
	          $BasePath .= "FCKeditor/";	// => "/example/FCKeditor/"
			  $editor->BasePath	= $BasePath;
			  // 指定FCKeditor編輯器的高度
			  $editor->Height = 400;
			  // 指定FCKeditor編輯器的工具列名稱
			  $editor->ToolbarSet = "Basic";
			  // 建立FCKeditor編輯器
              $editor->Create();
            ?>
           </td>
        </tr>
        <tr>
          <td class="post_message_style4">
	        <input type="submit" value="送出" />
            <input type="button" value="取消" class="post_message_style5" 
                onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
          </td>
        </tr>
      </table>
      <input name="insert_message" id="insert_message" type="hidden" value="post_message" />
    </form>
  </div> 
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>