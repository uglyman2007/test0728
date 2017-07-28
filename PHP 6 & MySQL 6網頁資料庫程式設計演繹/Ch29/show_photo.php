<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<?php
//----------------------------------
// 讀取 photo.xml, 看看有沒有相片
//----------------------------------
// XML檔案
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
$filename = $dirname . "/photo.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 相片的數目
	$_SESSION['PhotoCount'] = 0;
	
	// 載入 XML 文件 photo.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// photo.xml檔案的根節點
	$root = $dom->documentElement;
	
	// <photo>節點的數目
	$photo_count = 0;
	if ($root->hasChildNodes())
	{   		
		// 巡迴每一個相片的節點
		foreach ($root->childNodes as $childs)
		{
			// 元素節點
		  	if ($childs->nodeType == XML_ELEMENT_NODE)
				$photo_count++;
		}
		
		// 相片的數目
		if ($photo_count > 0) {			
			$_SESSION['PhotoCount'] = $photo_count;
		}
	}
	
	// 目前在第 ? 頁
	if (isset($_GET['page']))
		$_SESSION['CurrentPage'] = $_GET['page'];
	else
		$_SESSION['CurrentPage'] = 0;
	
	// 每頁顯示5個相片
	$_SESSION['CountPerPage'] = 9;
	// 最後一頁的頁碼
	$_SESSION['LastPage'] = ceil($_SESSION['PhotoCount'] / $_SESSION['CountPerPage']) - 1;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>部落格相簿</title>
<link href="CSS/show_photo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="show_photo_style1">
  <?php 
  // 有相片
  if ($_SESSION['PhotoCount'] > 0)
  {
  ?>    
    <!--********************************************-->
    <!-- 顯示 相片數目 ? 則 共分 ? 頁 第 1 頁/下頁/末頁 -->
    <!--********************************************-->
    <table class="show_photo_style2">
      <tr>
        <td class="show_photo_style3">
          相片數目 ： <?php echo $_SESSION['PhotoCount']; ?>
        </td>
	    <td class="show_photo_style3">
          共分 <?php echo ceil($_SESSION['PhotoCount'] / $_SESSION['CountPerPage']); ?> 頁 
        </td>
        <td class="show_photo_style4">
          <?php if ($_SESSION['CurrentPage'] != 0) { ?>
            <a href="<?php printf("%s?page=0", $_SERVER["PHP_SELF"]); ?>" class="show_photo_style5">
              首頁 /
            </a>
          <?php } ?>
          <?php if ($_SESSION['CurrentPage'] != 0) { ?>
            <a href='<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], max($_SESSION['CurrentPage'] - 1, 0)); ?>' 
              class="show_photo_style5">
              上頁 /
            </a>
          <?php } ?>
          第 <?php echo $_SESSION['CurrentPage'] + 1; ?> 頁
          <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], 
			  min($_SESSION['CurrentPage'] + 1, $_SESSION['LastPage'])); ?>" class="show_photo_style5">
              / 下頁
            </a>
          <?php } ?>
          <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
            <a href="<?php printf("%s?page=%d", $_SERVER["PHP_SELF"], $_SESSION['LastPage']); ?>" class="show_photo_style5">
              / 末頁
            </a>
          <?php } ?>
        </td>
      </tr>
    </table>
    <br />
  <!--******************-->
  <!--      顯示相片     -->
  <!--******************-->
  <table class="show_photo_style6">
  <?php
	if ($root->hasChildNodes())
	{   
	  // 目前節點的號碼
	  $index = 0;
	  // 目前頁的相片的開始號碼
	  $start_index = $_SESSION['CurrentPage'] * $_SESSION['CountPerPage'];
	  // 目前頁的相片的結束號碼
	  $end_index = ($_SESSION['CurrentPage'] + 1) * $_SESSION['CountPerPage'] - 1;
	  $end_index = min($end_index, $photo_count - 1);
	  
	  // 巡迴每一個相片的節點
	  foreach ($root->childNodes as $childs)
	  { 		
	    // 目前相片的節點
		if ($childs->nodeType == XML_ELEMENT_NODE)
		{
		  // 目前節點的號碼
		  if ($index < $start_index)
		  {
		    // 下一個節點
		    $index++;
		    continue;
		  }
		  
	 	  if ($childs->hasChildNodes())
		  {			  
		    // 巡迴目前相片節點的所有子節點	
	        foreach ($childs->childNodes as $child)
		    {							
		      // 目前相片的子節點是 <name> 
	   	      if ($child->nodeName == "name")
			  {  
			    // 每列的第1個圖片
			    if (($index % 3) == 0)
				{
  ?>
                  <tr>
  <?php
                }
  ?>
                    <td class="show_photo_style7">                      
                      <!-- 相片連結 -->
                      <a href="show_photo_detail.php?id=<?php echo $index; ?>" class="show_photo_style9">                        
                        <!-- 相片 -->
                        <img src="<?php echo $_SESSION['owner'] . "/" . $child->nodeValue; ?>" width="80" height="80" 
                      	  class="show_photo_style8" />
                        <br />
					    <?php echo $child->nodeValue; ?>
                      </a>
                    </td>
  <?php				
				// 每列的最後1個圖片
		        if ((($index % 3) == 2) || ($index == $end_index))
				{
  ?>
                  </tr>
  <?php
                }				
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
  ?>
  </table>
  <?php	
  }
  else
  {
  ?>
    沒有相片
  <?php	
  }
  ?>
  </div>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>