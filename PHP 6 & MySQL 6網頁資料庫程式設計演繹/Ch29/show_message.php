<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<?php
//----------------------------------
// 讀取 message.xml, 看看有沒有留言
//----------------------------------
// XML檔案 message.xml
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'] . "/message.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 留言的數目
	$_SESSION['MessageCount'] = 0;
	
	// 載入 XML 文件 message.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// message.xml檔案的根節點
	$root = $dom->documentElement;
	
	// <message>節點的數目
	$message_count = 0;
	
	if ($root->hasChildNodes())
	{   		
		// 巡迴每一個留言的節點
		foreach ($root->childNodes as $childs)
		{
			// 元素節點
		  	if ($childs->nodeType == XML_ELEMENT_NODE)
				$message_count++;
		}
		
		if ($message_count > 0)
		{
			// 留言的數目
			$_SESSION['MessageCount'] = $message_count;
		}
	}
	
	// 目前在第 ? 頁
	if (isset($_GET['page']))
		$_SESSION['CurrentPage'] = $_GET['page'];
	else
		$_SESSION['CurrentPage'] = 0;
	
	// 每頁顯示5個留言
	$_SESSION['CountPerPage'] = 5;
	// 最後一頁的頁碼
	$_SESSION['LastPage'] = ceil($_SESSION['MessageCount'] / $_SESSION['CountPerPage']) - 1;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言版</title>
<link href="CSS/show_message.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div id="divMessage" class="show_message_style1">
  <?php 
  // 有留言
  if ($_SESSION['MessageCount'] > 0)
  {
  ?>    
    <!--********************************************-->
    <!-- 顯示 留言數目 ? 則 共分 ? 頁 第 1 頁/下頁/末頁 -->
    <!--********************************************-->
    <table class="show_message_style2">
      <tr>
        <td class="show_message_style3">
          留言數目 <?php echo $_SESSION['MessageCount']; ?> 則
        </td>
        <td class="show_message_style3">
          共分 <?php echo ceil($_SESSION['MessageCount'] / $_SESSION['CountPerPage']); ?> 頁
        </td>
        <td class="show_message_style4">
        <!-- 首頁 / 上頁 -->
        <?php if ($_SESSION['CurrentPage'] != 0) { ?>
          <a href="<?php printf("%s?page=0", $_SERVER["PHP_SELF"]); ?>" class="show_message_style5">
            首頁 / 
          </a>
        <?php } ?>
        <?php if ($_SESSION['CurrentPage'] != 0) { ?>
          <a href='<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], max($_SESSION['CurrentPage'] - 1, 0)); ?>' 
            class="show_message_style5">
            上頁 /
          </a>
        <?php } ?>
        <!-- 第 ? 頁 -->
        第 <?php echo $_SESSION['CurrentPage'] + 1; ?> 頁
        <!-- 下頁 / 末頁 -->
        <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
          <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], 
            min($_SESSION['CurrentPage'] + 1, $_SESSION['LastPage'])); ?>" class="show_message_style5">
            / 下頁
          </a>
        <?php } ?>
        <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
          <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], $_SESSION['LastPage']); ?>" class="show_message_style5">
            / 末頁
          </a>
        <?php } ?> 
        </td>
      </tr>
    </table>
    <br />
  <!--******************-->
  <!--      顯示留言     -->
  <!--******************-->
  <?php
    if ($root->hasChildNodes())
    {   
      // 目前節點的號碼
      $index = 0;
      // 目前頁的留言的開始號碼
      $start_node = $_SESSION['CurrentPage'] * $_SESSION['CountPerPage'];
      // 目前頁的留言的結束號碼
      $end_index = ($_SESSION['CurrentPage'] + 1) * $_SESSION['CountPerPage'] - 1;
      $end_index = min($end_index, $message_count - 1);
      
      // 巡迴每一個留言的節點
      foreach ($root->childNodes as $childs)
      { 		
        // 目前留言的節點
        if ($childs->nodeType == XML_ELEMENT_NODE)
        {
          // 目前節點的號碼
          if ($index < $start_node)
          {
            // 下一個節點
            $index++;
            continue;
          }
          
          if ($childs->hasChildNodes())
          {			  
            // 巡迴目前留言節點的所有子節點	
            foreach ($childs->childNodes as $child)
            {							
              // 目前留言的子節點是 <content> 
              if ($child->nodeName == "content")
              { 
  ?>
                <!-- 顯示留言 -->
                <div class="show_message_style7">
                  <?php echo nl2br($child->nodeValue); ?>
                </div>
                <!-- 目前頁面最後一則留言之前 -->
                <?php if ($index < $end_index) { ?>
                  <div class="show_message_style6">&nbsp;</div>
                <?php } ?>
  <?php			
              }	
            }
          }
          
          // 下一個節點
          $index++;
          if ($index > $end_index)
            break;
        }
      }
    }
  }
  else
  {
  ?>
    沒有留言
  <?php	
  }
  ?>
  </div>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>