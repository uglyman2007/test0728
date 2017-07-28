<?php 
// 在每個元素的開頭呼叫此函數
function elementStartHandler($parser, $name, $attrs) 
{
	// 建立表格的一列
	echo "<tr>";
	// 顯示元素的名稱
	echo "<td align='left'>" . $name . "</td>";
}
// 在每個元素結尾呼叫此函數
function ElementEndHandler($parser, $name) 
{
	// 結束表格的一列
	echo "</tr>";
}
// 在每個字元資料呼叫此函數
function characterDataHandler($parser, $value) 
{
	// 顯示元素的數值
	echo "<td>" . $value . "</td>";
}

// 建立XML解析器
$parser = xml_parser_create('utf-8');
// 設定元素的開始與結束處理函式
xml_set_element_handler($parser, "elementStartHandler", "ElementEndHandler");
// 設定元素的字元資料的處理函式
xml_set_character_data_handler($parser, "characterDataHandler");
// 不要將元素名稱改成大寫
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);

// 開啟 books.xml
$file = "books.xml";
if ($fp = fopen($file, "r"))
{
	// 讀取整個 books.xml 檔案
	$data = fread($fp, filesize($file));
	
	// 顯示標題
	echo "<table><tr><th width='140'>元素名稱</th><th width='190'>元素數值</th>";
	
	// 解析 books.xml
	if (!xml_parse($parser, $data, feof($fp))) 
		die(xml_error_string(xml_get_error_code($parser)));
		
	echo "</table>";
}
else
{
	die("無法開啟 books.xml");
}

// 釋放XML解析器
xml_parser_free($parser);
?>