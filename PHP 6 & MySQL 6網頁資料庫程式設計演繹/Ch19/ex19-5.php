<?php
$file = 'books.xml';
if (file_exists($file)) 
{
	// 傳回一個SimpleXMLElement物件
	$root = simplexml_load_file($file);
	// 顯示根元素 <books> 的名稱
	echo $root->getName() . "<br />";

	// 顯示根元素 <books> 的所有子元素 <book>
	foreach ($root->children() as $element)
	{
    	echo $element->getName() . "<br />";
		
		// 顯示元素 <book> 的所有子元素
		foreach ($element->children() as $child)
    		echo $child->getName() . "<br />";
	}
}
else
{
 	die("無法開啟 books.xml");
}
?>