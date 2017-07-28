<?php 
if (!isset($_SESSION)) {
  session_start();
}
// 還沒登入
if (!isset($_SESSION['Username']))
	header("Location: login_form.php");	
?>
<?php 
//--------------------------------
// 在 photo.xml 內插入一張相片
//--------------------------------
// XML檔案
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
$filename = $dirname . "/photo.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 photo.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// photo.xml檔案的根節點
	$root = $dom->documentElement;
	
	// <photo>節點的數目
	if ($root->hasChildNodes())
	{ 	
		$_SESSION['has_photos'] = false;
  		
		// 巡迴每一個相片的節點
		foreach ($root->childNodes as $child)
	  	{ 		
	    	// 目前相片的節點
			if ($child->nodeType == XML_ELEMENT_NODE)
			{
				$_SESSION['has_photos'] = true; 
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
<title>上傳相片</title>
<link href="CSS/post_photo.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="JavaScript/post_photo.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
    var dsPhoto = new Spry.Data.XMLDataSet("<?php echo $_SESSION['owner']; ?>/photo.xml", "photos/photo",
	    {useCache:false, loadInterval: 1000});
//-->
</script>
</head>
<body>
<!-- 載入上邊區塊 -->
<?php require_once("menu_top.php"); ?>
<table class="post_photo_style1">
  <tr>
    <td class="post_photo_style2">
      注意事項：
      <br /><br />
      <span>1. 相片檔案大小總和不能超過</span>
      <span class="post_photo_style3"> 50MB</span>。<br />  
      2. 若再次修改之前上傳的相片檔案內容，請先移除後，再重新上傳。<br />
      3. 相片檔案名稱相同，將無法重複上傳!!
    </td>
  </tr>
  <tr>
    <td class="post_photo_style4">
      請按下<span class="post_photo_style3">【瀏覽】</span>按鈕選擇您要上傳的相片。<br />
      如果您沒有看到【瀏覽】按鈕，表示您的瀏覽器不支援上傳相片
    </td>
  </tr>
  <tr>
    <td class="post_photo_style5">
      <form action="upload_photo.php" method="post" enctype="multipart/form-data">
        <table class="post_photo_style6">
          <tr>
            <td class="post_photo_style7">
              1.
            </td>
            <td>
              <input name="file[]" id="file[]" type="file" size="100" class="post_photo_style8" />
            </td>
        </tr>
        <tr>
          <td class="post_photo_style7">
            2.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="100" class="post_photo_style8" />
          </td>
        </tr>
        <tr>
          <td class="post_photo_style7">
            3.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="100" class="post_photo_style8" />
          </td>
        </tr>
        <tr>
          <td class="post_photo_style7">
            4.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="100" class="post_photo_style8" />
          </td>
        </tr>
        <tr>
          <td class="post_photo_style7">
            5.
          </td>
          <td>
            <input name="file[]" type="file" id="file[]" size="100" class="post_photo_style8" />
          </td>
        </tr>
        <tr>
          <td colspan="2" class="post_photo_style9">
            <input type="submit" value="上傳檔案" />
          </td>
        </tr>
      </table>
    </form>
  </td>
</tr>
<tr>
  <td class="post_photo_style10">
    <table class="post_photo_style11">
      <tr>                  
        <td class="post_photo_style2">
          <table class="post_photo_style11">
            <!--  *************************  -->
            <!--    顯示之前設定過的相片檔案     -->
            <!--  *************************  -->
            <?php 
              // 之前沒有設定過附檔
              if (!$_SESSION['has_photos']) 
              {
            ?>
            	<tr>
              	  <td class="post_photo_style12">
                    目前沒有上傳的相片
              	  </td>
            	</tr>
            <?php 
			  // 之前有設定過相片, 顯示相片檔案的名稱與大小
              } else {
            ?>
                <tr>
                  <td class="post_photo_style12">
                    <!-- 讀取 photo.xml 檔案的資料集 -->
                    <div spry:region="dsPhoto">
                      <table class="post_photo_style19">
                        <tr spry:repeat="dsPhoto" spry:odd="post_photo_style13" spry:even="post_photo_style14">
                          <!-- 顯示相片檔案的名稱 -->
                          <td class="post_photo_style15">
                            {name}
                          </td>
                          <!-- 顯示相片檔案的大小 -->
                          <td class="post_photo_style16">
                            {size}
                          </td>
                          <!-- 移除相片檔案 -->
                          <td class="post_photo_style17">
                            <input type="button" value="移除" onmousedown="removePhoto('{name}');" />
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
          <td class="post_photo_style18">
            <input type="button" value="確認返回" 
              onclick="document.location='<?php echo $_SESSION['PrevPage']; ?>'; return false;" />
          </td>
        </tr>
      </table> 
  </td>
</tr>
</table>
<!-- 載入下邊區塊 -->
<?php require_once("menu_bottom.php"); ?>
</body>
</html>