<?php
if (!isset($_SESSION)) {
  session_start();
}
// 網頁擁有者
$_SESSION['owner'] = "daniel";
// 前一個網頁
$_SESSION['PrevPage'] = $_SERVER['PHP_SELF'];
?>
<!-- 建立網頁擁有者的資料夾與相關檔案 -->
<?php require_once("create_file.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>部落格</title>
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
  <div class="index_style1">
    <?php
      // 網頁擁有者的資料夾路徑
      $dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
      // 開啟 XML檔案
      $filename = $dirname . "/paper.xml";
      
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
              if ($childs->hasChildNodes())
              {			  
                // 巡迴目前文章節點的所有子節點		
                foreach ($childs->childNodes as $child)
                {
                  // 目前文章節點的子節點是 <subject> 
                  if ($child->nodeName == "subject")
                  {		
    ?>
                    <div class="index_style2">
                      <table class="index_style3">
                        <tr>
                          <td class="index_style4">
                            <?php echo $child->nodeValue; ?>
                          </td>
                          <td class="index_style5">
                            <a href="post_respond.php?id=0" class="index_style6">
                              我要回應
                            </a>
                          </td>
                        </tr>
                      </table>
                    </div>
    <?php				
                  }							
                  // 目前文章節點的子節點是 <content>, 文章的內容
                  if ($child->nodeName == "content")
                  { 
    ?>
                    <div class="index_style7">
                      <?php echo nl2br($child->nodeValue); ?>
                    </div>
    <?php				
                  }			
                  // 目前文章節點的子節點是 <respond>
                  if ($child->nodeName == "respond")
                  {  
    ?>
                    <div class="index_style8">&nbsp;</div>
                    <span class="index_style9">回應 : </span>
                    <br />
                    <div class="index_style7">
                      <?php echo nl2br($child->nodeValue); ?>
                    </div>
    <?php		
                  }	
                }	
              }
              // 只顯示第1篇文章
              break;
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