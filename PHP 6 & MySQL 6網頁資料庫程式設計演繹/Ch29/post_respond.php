<?php require_once("FCKeditor/fckeditor.php"); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
//--------------------------------
// 在 paper.xml 內插入一篇回應
//--------------------------------

// 按下 [送出] 按鈕
if (isset($_POST['insert_respond']) && ($_POST['insert_respond'] == "post_respond") && (!empty($_POST['content'])))
{
	if (isset($_GET['id']))
	{
		// XML檔案
		$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'] . "/paper.xml";

		// XML檔案存在
		if (file_exists($filename))
		{
			// 載入 XML 文件 paper.xml
			$dom = new DOMDocument();
			$dom->load($filename);
			// paper.xml檔案的根節點
			$root = $dom->documentElement;
			
			// <paper>節點的數目
			if ($root->hasChildNodes())
			{
				// 第?個節點
	    		$index = 0;
	
				// 巡迴每一個<paper>節點
				foreach ($root->childNodes as $child)
		  		{ 		
	    			// 目前的<paper>節點
					if ($child->nodeType == XML_ELEMENT_NODE)
					{			
					    // <paper>節點的編號等於URL參數id的值		
						if ($index == $_GET['id'])
						{
							// 建立 <paper> 節點的子節點 <respond>
							$respond = $dom->createElement("respond");
							$respond->nodeValue = htmlspecialchars(trim($_POST['content'], ENT_QUOTES));
							$child->appendChild($respond);
							break;
						}
									
						// 第?個節點
    					$index++;
					}	
				}
			}
			
			// 儲存 XML 文件 paper.xml
			$dom->save($filename);
		}
		// 回到前一頁
		header("Location: " . $_SESSION['PrevPage']);
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>發表文章的回應</title>
<link href="CSS/post_respond.css" rel="stylesheet" type="text/css" />
<script src="FCKeditor/fckconfig.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="post_respond_style1">
    發表回應
  </div>
  <div class="post_respond_style2">
    <form method="post">
      <table class="post_respond_style3">
        <tr>
          <td class="post_respond_style4">
            <?php
			  // 建立FCKeditor的物件
              $editor = new FCKeditor("content");
			  // 指定FCKeditor資料夾的相對路徑
			  $BasePath = $_SERVER['PHP_SELF'];
              $BasePath = substr($BasePath, 0, strpos($BasePath, "post_respond.php"));
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
          <td class="post_respond_style4">
	        <input type="submit" value="送出" />
            <input type="button" value="取消" class="post_respond_style5" 
             onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
          </td>
        </tr>
      </table>
      <input name="insert_respond" id="insert_respond" type="hidden" value="post_respond" />
    </form>
  </div> 
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>