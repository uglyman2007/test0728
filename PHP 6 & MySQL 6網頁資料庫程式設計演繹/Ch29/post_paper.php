<?php require_once("Connections/function.php"); ?>
<?php require_once("FCKeditor/fckeditor.php"); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 還沒登入
if (!isset($_SESSION['Username']))
	header("Location: login_form.php");	
?>
<?php 
// 記住使用者填入的資料
if (!isset($_COOKIE['subject']))
	setcookie("subject", "", time() + 3600);
?>
<?php 
//--------------------------------
// 在 paper.xml 內插入一篇文章
//--------------------------------

// 按下 [送出] 按鈕
if (isset($_POST['insert_paper']) && ($_POST['insert_paper'] == "post_paper") && (!empty($_POST['content'])))
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
			
		// 建立新的 <paper> 節點
		$paper = $dom->createElement("paper");
		$root->insertBefore($paper, $root->firstChild);

		// 建立 <paper> 節點的子節點 <author>
		$author = $dom->createElement("author");
		$author->nodeValue = $_SESSION['owner'];
		$paper->insertBefore($author, $paper->firstChild);
		
		// 建立 <paper> 節點的子節點 <subject>
		$subject = $dom->createElement("subject");
		$subject->nodeValue = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES);
		$paper->appendChild($subject);
		
		// 建立 <paper> 節點的子節點 <content>
		$content = $dom->createElement("content");
		$content->nodeValue = htmlspecialchars($_POST['content'], ENT_QUOTES);
		$paper->appendChild($content);
		
		// 儲存 XML 文件 paper.xml
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
<title>部落格</title>
<link href="CSS/post_paper.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/post_paper.js" type="text/javascript"></script>
<script src="FCKeditor/fckconfig.js" type="text/javascript"></script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="post_paper_style1">
    發表文章
  </div>
  <div class="post_paper_style2">
    <form method="post">
       <table class="post_paper_style3">
        <tr>
          <td class="post_paper_style9">
            文章標題          
          </td>
          <td class="post_paper_style8">
            <input name="subject" id="subject" type="text" size="84"
              value="<?php echo uniDecode($_COOKIE['subject']); ?>" />
          </td>
        </tr>
        <tr>
          <td class="post_paper_style4">
            內容          
          </td>
          <td class="post_paper_style5">
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
          <td class="post_paper_style4">&nbsp;                    
          </td>
          <td class="post_paper_style6">
	        <input type="submit" value="送出" 
              onclick="return CheckFields();" />
            <input type="button" value="取消" class="post_paper_style7" 
             onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
         </td>
        </tr>
      </table>
      <input name="insert_paper" id="insert_paper" type="hidden" value="post_paper" />
    </form>
  </div>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>