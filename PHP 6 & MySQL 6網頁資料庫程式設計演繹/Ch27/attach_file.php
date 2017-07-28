<?php 
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
// 前一個檔案的URL
if ($_SESSION['PrevUrl'] != "index.php") { 
	header("Location: index.php");
}
?>
<?php 
//*******************************//
// 檢查之前是否有設定過附檔
//*******************************//
// 之前沒有設定過附檔 
$_SESSION['has_attach_files'] = false;

// XML檔案 file.xml 的檔案路徑
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
$filename = $dirname . "/file.xml";
	  
// XML檔案 file.xml 存在
if (file_exists($filename))
{
	// 載入 file.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// file.xml檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   		
		// 巡迴每一個節點
		foreach ($root->childNodes as $child)
	  	{ 		
	    	// 目前的節點
			if ($child->nodeType == XML_ELEMENT_NODE)
			{
				$_SESSION['has_attach_files'] = true; 
				break;
			}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>夾帶附檔</title>
<link href="CSS/attach_file.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="JavaScript/attach_file.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var dsFile = new Spry.Data.XMLDataSet("xml/file.xml", "files/file", {useCache: false, loadInterval: 500});
//-->
</script>
</head>
<body>
<table class="attach_file_style1">
  <tr>
    <td class="attach_file_style2">
      注意事項：
      <br /><br />
      <span>1. 檔案大小總和不能超過</span>
      <span class="attach_file_style3"> 50MB</span>。<br />  
      2. 若再次修改之前上傳的附加檔案內容，請先移除後，再重新上傳。<br />
      3. 附加檔案名稱相同，將無法重複上傳!
    </td>
  </tr>
  <tr>
    <td class="attach_file_style4">
      請按下<span class="attach_file_style3">【瀏覽】</span>按鈕選擇您要附加的檔案。<br />
      如果您沒有看到【瀏覽】按鈕，表示您的瀏覽器不支援附加檔案功能。
    </td>
  </tr>
  <tr>
    <td class="attach_file_style5">
      <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <table class="attach_file_style6">
          <tr>
            <td class="attach_file_style7">
              1.
            </td>
            <td>
              <input name="file[]" id="file[]" type="file" size="60" class="attach_file_style8" />
            </td>
        </tr>
        <tr>
          <td class="attach_file_style7">
            2.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="60" class="attach_file_style8" />
          </td>
        </tr>
        <tr>
          <td class="attach_file_style7">
            3.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="60" class="attach_file_style8" />
          </td>
        </tr>
        <tr>
          <td class="attach_file_style7">
            4.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="60" class="attach_file_style8" />
          </td>
        </tr>
        <tr>
          <td class="attach_file_style7">
            5.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="60" class="attach_file_style8" />
          </td>
        </tr>
        <tr>
          <td colspan="2" class="attach_file_style9">
            <input type="submit" value="上傳檔案" />
          </td>
        </tr>
      </table>
    </form>
  </td>
</tr>
<tr>
  <td class="attach_file_style10">
    <table class="attach_file_style11">
      <tr>                  
        <td class="attach_file_style2">
          <table class="attach_file_style11">
            <!--  *************************  -->
            <!--      顯示之前設定過的附檔      -->
            <!--  *************************  -->
            <?php 
              // 之前沒有設定過附檔
              if (!$_SESSION["has_attach_files"]) 
              {
            ?>
            	<tr>
              	  <td class="attach_file_style12">
                    目前無附加檔案
              	  </td>
            	</tr>
            <?php 
			  // 之前有設定過附檔, 顯示附檔的名稱與大小
              } else {
            ?>
                <tr>
                  <td class="attach_file_style12">
                    <!-- 讀取 file.xml 檔案的資料集 -->
                    <div spry:region="dsFile">
                      <table>
                        <tr spry:repeat="dsFile" spry:odd="attach_file_style13" spry:even="attach_file_style14">
                          <!-- 顯示附檔的名稱 -->
                          <td class="attach_file_style15">
                            {name}
                          </td>
                          <!-- 顯示附檔的大小 -->
                          <td class="attach_file_style16">
                            {size}
                          </td>
                          <!-- 移除附檔 -->
                          <td class="attach_file_style17">
                            <input type="button" value="移除" onmousedown="removeAttachFile('{name}');" />
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
            <?php 			          
              }
            ?>
          </table>
          </td>
        </tr>
        <tr>  
          <td class="attach_file_style18">
            <input type="button" value="確認返回" onclick="document.location='index.php'; return false;" />
          </td>
        </tr>
      </table> 
  </td>
</tr>
</table>
</body>
</html>