<?php 
// 建立 session
if (!isset($_SESSION)) {
	session_start();
}
// 設定HTTP編碼
mb_internal_encoding("big5");
?>
<?php
//-----------------------------------
// 建立MIME的邊界字串
//-----------------------------------

$boundary_string = md5(uniqid(rand(), true));
$boundary = "**_MIME_Boundary_{$boundary_string}_**";

//-----------------------------------
// 在電子郵件內加入附檔
//-----------------------------------

// XML檔案 file.xml
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
$filename = $dirname . "/file.xml";

// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 file.xml
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
						    // 取得上傳檔案的資訊
							$file = iconv("utf-8", "big5", ($dirname . "/" . $child->nodeValue));
							$file_name = iconv("utf-8", "big5", $child->nodeValue);
						}
						
						// 目前的子節點是 <type> 
	    			  	if ($child->nodeName == "type")
		      			{	
						    // 取得上傳檔案的資訊   		    
							$file_type = $child->nodeValue;
	  
	  						//---------------------------------------
							// 讀取附檔的檔案內容到 $append_file_data內
							//---------------------------------------
							$fp = fopen($file, "rb");  
							$append_file_data = fread($fp, filesize($file));
							fclose($fp);
							// base64_encode使用MIME base64來編碼附檔的內容, chunk_split將附檔內容分成數塊
							$append_file_data = chunk_split(base64_encode($append_file_data));
						  
						    //-----------------------
							// 設定附檔的電子郵件資訊
							//-----------------------
							// MIME的邊界字串
							$append_file_body .= "\n\n--{$boundary}\n";
							$append_file_body .= "Content-Type: {$file_type};\n";
							// 附檔的名稱
							$append_file_body .= " name=\"{$file_name}\"\n";
							$append_file_body .= "Content-Transfer-Encoding: base64\n\n";
							
							//----------------------------
							// 加上目前附檔的電子郵件資訊
							//----------------------------
							$append_file_body .= $append_file_data ."\n\n";
						}
					}
				}
			}
		}
	}
}

//-------------------------
// 取得表單欄位的內容
//-------------------------

$from = $_SESSION['sendfrom'];				// 寄信人
$to = $_SESSION['sendto'];	        		// 收信人
$cc = $_SESSION['cc'];	        			// 副本
$bcc = $_SESSION['bcc'];	        		// 密件副本
$subject = iconv("utf-8", "big5", $_SESSION['subject']);   // 主旨

//-------------------------
// 電子郵件的表頭
//-------------------------
$header = "From: $from\nReply-To: $to\n";
if (!empty($cc))
	$header .= "Cc: $cc\n";
if (!empty($bcc))
	$header .= "Bcc: $bcc\n";
	
$header .= "MIME-Version: 1.0" . "\n";
$header .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"";

//-------------------------
// 電子郵件的本文
//-------------------------

// MIME的邊界字串
$body = "\n\n--{$boundary}\n";
$body .= "Content-Type: text/plain; charset=\"big5\"\n";
// 本文
$body .= "Content-Transfer-Encoding: 8bit\n\n". iconv("utf-8", "big5", $_SESSION['body']) . "\n\n";

//-------------------------
// 電子郵件的附檔
//-------------------------

// 新增附檔的郵件本體
$body .= $append_file_body;
$body .= "\n\n--{$boundary}--\n";

//-------------------------
// 寄出電子郵件
//-------------------------

mail($to, $subject, $body, $header);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>寄出電子郵件</title>
<script type="text/javascript">
	alert("您的電子郵件已經寄出");
	location.href = "index.php";
</script>
</head>
<body>
</body>
</html>