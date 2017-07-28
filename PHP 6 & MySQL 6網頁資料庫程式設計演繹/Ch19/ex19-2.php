<?php 
$dom = new DOMDocument('1.0', 'utf8');
// 建立根元素 <companies>
$root = $dom->createElement('companies');
$root = $dom->appendChild($root);
// 建立新的 <company> 節點
$company = $dom->createElement("company");
$root->appendChild($company);

// 建立 <company> 節點的子節點 <name>
$name = $dom->createElement("name");
$name->nodeValue = "文魁資訊股份有限公司";
$company->insertBefore($name, $company->firstChild);
		
// 建立 <company> 節點的子節點 <short>
$short = $dom->createElement("short");
$short->nodeValue = "文魁圖書";
$company->appendChild($short);
		
// 儲存 XML 文件 publisher.xml
$dom->save('publisher.xml');
?>