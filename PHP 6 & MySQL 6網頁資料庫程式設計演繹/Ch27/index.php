<?php require_once('Connections/connection.php'); ?>
<?php require_once('Connections/function.php'); ?>
<?php 
// 建立 session
if (!isset($_SESSION)) {
	session_start();
}
// 前一個檔案的URL
$_SESSION['PrevUrl'] = "index.php";

// 用來插入資料表的 [attachfile] 欄位
$_SESSION['attach_files'] = "";
// 沒有上傳檔案
$_SESSION['has_attach_files'] = false;
?>
<?php 
//***************************************************//
// 如果 file.xml 不存在, 就建立 file.xml 的資料夾與檔案
//***************************************************//
	
// 如果xml的資料夾不存在, 就建立xml資料夾
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
if (!file_exists($dirname)) {
	mkdir($dirname);
}

// 如果 file.xml 不存在, 就建立 file.xml 檔案
$filename = $dirname . "/file.xml";
if (!file_exists($filename))
{
	// 建立 file.xml 檔案
	if ($handle = fopen($filename, "wt"))
	{
		// file.xml 存在而且檔案可以寫入
		if (is_writable($filename))
		{
			// 寫入<files>元素
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><files></files>");
		}
	}
}
?>
<?php 
//*****************************//
// 顯示目前的附加檔案	
//*****************************//

// XML檔案存在
if (file_exists($filename))
{
	// 載入XML文件 file.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// file.xml 檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   
		// 巡迴每一個的節點
		foreach ($root->childNodes as $childs)
		{
			// 目前的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				if ($childs->hasChildNodes())
				{	
					// 巡迴目前節點的所有子節點		
					foreach ($childs->childNodes as $child)
					{
						// 目前的子節點是 <name> 
						if ($child->nodeName == "name")
						{	
							// 資料表的 [attachfile] 欄位
							if (!empty($_SESSION['attach_files']))
							{
								$_SESSION['attach_files'] .= ", ";
							}
										
							// 附加檔案	
							$_SESSION['attach_files'] .= $child->nodeValue;
							// 有附加檔案
							$_SESSION['has_attach_files'] = true;
						}
					}
				}
			}
		}

		// 儲存 XML 文件 file.xml
		$dom->save($filename);
	}
}
?>
<?php 
//*******************************//
// 加入附檔
//*******************************//

// 按下 [加入附檔] 按鈕
if ((isset($_POST["file_append"])) && ($_POST["file_append"] == "加入附檔")) 
{
	// 儲存電子郵件的內容
	$_SESSION['sendfrom'] = $_POST['sendfrom'];
  	$_SESSION['sendto'] = $_POST['sendto'];
  	$_SESSION['cc'] = $_POST['cc'];
  	$_SESSION['bcc'] = $_POST['bcc'];
  	$_SESSION['subject'] = $_POST['subject'];
  	$_SESSION['body'] = $_POST['body'];
	// 不要在ch27資料庫的mail資料表內插入新紀錄
	$_POST["insert"] = "";
	
	header("Location: attach_file.php");
}
?>
<?php
//*****************************************//
// 在ch27資料庫的mail資料表內插入一筆新的紀錄
// 然後寄出電子郵件
//*****************************************//

if ((isset($_POST["insert"])) && ($_POST["insert"] == "send_mail")) 
{
	// 選擇 MySQL 資料庫ch27
	mysql_select_db('ch27', $connection) or die('資料庫ch27不存在');	
	// 在mail資料表內插入一筆新的紀錄
	$query = sprintf("INSERT INTO mail (sendfrom, sendto, cc, bcc, subject, body, attachfile) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValue($_POST['sendfrom'], "text"),
                       GetSQLValue($_POST['sendto'], "text"),
                       GetSQLValue($_POST['cc'], "text"),
                       GetSQLValue($_POST['bcc'], "text"),
                       GetSQLValue($_POST['subject'], "text"),
                       GetSQLValue($_POST['body'], "text"),
                       GetSQLValue($_POST['attachfile'], "text"));
					   
	// 傳回結果集
    $result = mysql_query($query, $connection);

	if ($result) 
	{
		// 儲存電子郵件的內容
  		$_SESSION['sendfrom'] = $_POST['sendfrom'];
	  	$_SESSION['sendto'] = $_POST['sendto'];
  		$_SESSION['cc'] = $_POST['cc'];
  		$_SESSION['bcc'] = $_POST['bcc'];
  		$_SESSION['subject'] = $_POST['subject'];
  		$_SESSION['body'] = $_POST['body'];
  
	  	header("Location: send_mail.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>線上郵寄</title>
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/index.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
var dsFile = new Spry.Data.XMLDataSet("xml/file.xml", "files/file");
//-->
</script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
  <table class="index_style1">
    <tr>
      <td class="index_style2">
        寄件者(From) : 
      </td>
      <td class="index_style3">
        <select name="sendfrom" id="sendfrom" class="index_style14">
          <option value="daniel@derek.com">
            daniel@derek.com
          </option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="index_style2">
        收件者(To) : 
      </td>
      <td class="index_style3">
        <table class="index_style5">
          <tr>
            <td class="index_style6">
              <input name="sendto" id="sendto" type="text" size="60" class="index_style4" 
              	value="<?php echo $_SESSION['sendto']; ?>" />
            </td>
            <td>
              <input type="submit" value="寄出信件" class="index_style7" onclick="return CheckFields();" />
            </td>
          </tr>
        </table>        
      </td>
    </tr>
    <tr>
      <td class="index_style2">
        副本(Cc) : 
      </td>
      <td class="index_style3">
        <input name="cc" id="cc" type="text" size="60" class="index_style4" 
          value="<?php echo $_SESSION['cc']; ?>" />
      </td>
    </tr>
    <tr>
      <td class="index_style2">
        密件副本(Bcc) :
      </td>
      <td class="index_style3">
        <input name="bcc" id="bcc" type="text" size="60" class="index_style4"  
          value="<?php echo $_SESSION['bcc']; ?>" />
      </td>
    </tr>
    <tr>
      <td class="index_style2">
        主旨 : 
      </td>
      <td class="index_style3">
        <input name="subject" id="subject" type="text" size="60" class="index_style4"   
          value="<?php echo $_SESSION['subject']; ?>" />
      </td>
    </tr>
    <tr>
      <td class="index_style2">
        附檔 : 
      </td>
      <td class="index_style3">
        <table class="index_style5">
          <tr>
            <td class="index_style8">
              <table class="index_style9">
                <?php 
		 	      // 沒有上傳的檔案
				  if (!$_SESSION["has_attach_files"]) 
				  {
				?>
                <tr>
                  <td class="index_style10">
                    <span class="index_style11">目前無附加檔案</span>
                  </td>
                </tr>
                <?php 
				  } else {
				?>
                <tr>                        
                  <td>
                    <div spry:region="dsFile" spry:repeat="dsFile" class="index_style15">
			    	  {name}
                      <br />
 				    </div>
                  </td>
                </tr>
                <?php 			          
				  }
 			    ?>
              </table>
            </td>
            <td>
              <table class="index_style5">
                <tr>
                  <td>
	                <input name="file_append" id="file_append" type="submit" value="加入附檔" class="index_style7" />
                  </td>
                </tr>
                <tr>
                  <td>
    	            <input type="button" value="清除附檔" class="index_style7" 
        	          onclick="document.location='clean_attach_file.php'; return false;"/>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <table class="index_style12">
          <tr>
            <td>
              <textarea name="body" id="body" cols="69" rows="15" class="index_style13"><?php echo $_SESSION['body']; ?></textarea>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input name="attachfile" id="attachfile" type="hidden" value="<?php echo $_SESSION['attach_files']; ?>" />
  <input name="insert" id="insert" type="hidden" value="send_mail" />
</form>
</body>
</html>