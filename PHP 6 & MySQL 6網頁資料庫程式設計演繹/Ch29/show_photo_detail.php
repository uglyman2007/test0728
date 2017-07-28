<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<?php
// 目前在第 ? 頁
if (isset($_GET['id']))
	$_SESSION['CurrentPage'] = $_GET['id'];
else
	$_SESSION['CurrentPage'] = 0;

// 每頁顯示5個相片
$_SESSION['CountPerPage'] = 1;
// 最後一頁的頁碼
$_SESSION['LastPage'] = $_SESSION['PhotoCount'] - 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>部落格相簿</title>
<link href="CSS/show_photo_detail.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div id="divMessage" class="show_photo_detail_style1">
  <?php 
  // 有相片
  if ($_SESSION['PhotoCount'] > 0)
  {
  ?>
    <!--********************************************-->
    <!-- 顯示 相片數目 ? 則 共分 ? 頁 第 1 頁/下頁/末頁 -->
    <!--********************************************-->
    <table class="show_photo_detail_style2">
      <tr>
        <td class="show_photo_detail_style3">
          相片數目 ： <?php echo $_SESSION['PhotoCount']; ?>
        </td>
	    <td class="show_photo_detail_style3">
          共分 <?php echo ceil($_SESSION['PhotoCount'] / $_SESSION['CountPerPage']); ?> 頁 
        </td>
        <td class="show_photo_detail_style4">
          <?php if ($_SESSION['CurrentPage'] != 0) { ?>
            <a href="<?php printf("%s?id=0", $_SERVER["PHP_SELF"]); ?>" class="show_photo_detail_style5">
              首頁 /
            </a>
          <?php } ?>
          <?php if ($_SESSION['CurrentPage'] != 0) { ?>
            <a href='<?php printf("%s?id=%d", $_SERVER["PHP_SELF"], max($_SESSION['CurrentPage'] - 1, 0)); ?>' 
              class="show_photo_detail_style5">
              上頁 /
            </a>
          <?php } ?>
          第 <?php echo $_SESSION['CurrentPage'] + 1; ?> 頁
          <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
            <a href="<?php printf("%s?id=%d", $_SERVER["PHP_SELF"], 
			  min($_SESSION['CurrentPage'] + 1, $_SESSION['LastPage'])); ?>" class="show_photo_detail_style5">
              / 下頁
            </a>
          <?php } ?>
          <?php if ($_SESSION['CurrentPage'] < $_SESSION['LastPage']) { ?>
            <a href="<?php printf("%s?id=%d", $_SERVER["PHP_SELF"], $_SESSION['LastPage']); ?>" class="show_photo_detail_style5">
              / 末頁
            </a>
          <?php } ?>
        </td>
      </tr>
    </table>
    <br />
  <!--******************-->
  <!--   顯示詳細的相片   -->
  <!--******************-->
  <table class="show_photo_detail_style6">
  <?php
    // 開啟 XML檔案
	$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
	$filename = $dirname . "/photo.xml";
	// 沒有找到節點
	$find_node = false;
	  
	// XML檔案存在
	if (file_exists($filename))
	{
 	  // 載入 XML 文件 photo.xml
	  $dom = new DOMDocument();
	  $dom->load($filename);
	  // photo.xml檔案的根節點
	  $root = $dom->documentElement;
	  	  
	  if ($root->hasChildNodes())
	  {
	    // 目前節點的號碼
	    $index = 0;
	    
		// 巡迴每一個相片的節點
	    foreach ($root->childNodes as $childs)
	    { 		
	      // 目前相片的節點
		  if ($childs->nodeType == XML_ELEMENT_NODE)
		  {
	        // 目前圖片的節點
	        if ($index == $_GET['id'])
 	        {   
		      if ($childs->hasChildNodes())
		      {			  
		        // 巡迴目前相片節點的所有子節點		
	            foreach ($childs->childNodes as $child)
                {		
			      // 目前相片的子節點是 <subject> 
		          if ($child->nodeName == "name")
			      {
  ?>
                    <tr>
                      <td class="show_photo_detail_style7">  
                        <img src="<?php echo $_SESSION['owner'] . "/" . $child->nodeValue; ?>" 
                          class="show_photo_detail_style8" />
                        <br />
                        <?php echo $child->nodeValue; ?>
                      </td>
                    </tr>
  <?php			
                    // 找到節點
					$find_node = true;
                    break;
				  }	
				}	
			  }
            }
			
			// 找到節點
			if ($find_node) {
              break;
			}
			// 目前節點的號碼
	        $index++;
          }				
        }	
      }
    }
  ?>
  </table>
  <?php	
  }
  ?>
  </div>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>