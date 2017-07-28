<?php
if (!isset($_SESSION)) {
  session_start();
}
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>部落格</title>
<link href="CSS/show_paper.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="show_paper_style1">
    <?php
      // 開啟 XML檔案
      $filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'] . "/paper.xml";
      // 第?個節點
      $index = 0;
      
      // XML檔案存在
      if (file_exists($filename))
      {
        // 載入 XML 文件 paper.xml
        $dom = new DOMDocument();
        $dom->load($filename);
        // paper.xml檔案的根節點
        $root = $dom->documentElement;
        
        if ($root->hasChildNodes())
        {
          // 巡迴每一篇文章的節點
          foreach ($root->childNodes as $childs)
          {
		    // 目前文章的節點
            if ($childs->nodeType == XML_ELEMENT_NODE)
            {
			  // 目前文章
		      if ($index == $_GET['id'])
              {
                if ($childs->hasChildNodes())
                {			  
                  // 巡迴目前文章節點的所有子節點		
                  foreach ($childs->childNodes as $child)
                  {
                    // 目前文章的子節點是 <subject> 
                    if ($child->nodeName == "subject")
                    {			
    ?>
                      <div class="show_paper_style2">
                        <table class="show_paper_style3">
                          <tr>
                            <td class="show_paper_style4">
                              <?php echo $child->nodeValue; ?>
                            </td>
                            <td class="show_paper_style5">
                              <a href="post_respond.php?id=<?php echo $index; ?>" class="show_paper_style6">
                                我要回應
                              </a>
                            </td>
                          </tr>
                        </table>
                      </div>
    <?php		
                    }
              
                    // 目前上傳檔案的子節點是 <content>
                    if ($child->nodeName == "content")
                    {  
    ?> 
                      <div class="show_paper_style7">
                        <?php echo nl2br($child->nodeValue); ?>
                      </div>
    <?php	
                    }
                
                    // 目前上傳檔案的子節點是 <respond>
                    if ($child->nodeName == "respond")
                    {
	?>
                      <div class="show_paper_style8">&nbsp;</div>
                      <span class="show_paper_style9">回應 : </span>
                      <br />
                      <div class="show_paper_style7">
                        <?php echo nl2br($child->nodeValue); ?>
                      </div>
    <?php
                    }
                  }
                }
				
				break;
			  }
              
              // 第?個節點  
              $index++;
            }
          }
        }
      }
    ?>
  </div> 
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>