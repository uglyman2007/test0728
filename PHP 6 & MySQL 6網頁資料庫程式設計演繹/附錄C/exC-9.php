<?php
// 建立 XMLWriter 物件
$xml = new XMLWriter();
// 建立 test.xml 文件
$xml->openURI('test.xml');
// 讓XML的標記斷行
$xml->setIndentString(' ');
$xml->setIndent(true);

// 建立 XML 文件的開始標記
$xml->startDocument('1.0', 'utf-8');
// 建立 XML 文件的 DTD 開始標記
$xml->startDtd('html', '-//W3C//DTD XHTML 1.0 Transitional//EN', 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd');
// 結束目前的 DTD
$xml->endDtd();

// 建立 html 元素的開始標記
$xml->startElement('html');
// 寫入 html 標記的 xmlns 屬性
$xml->writeAttribute('xmlns', 'http://www.w3.org/1999/xhtml');

// 建立 head 元素的開始標記
$xml->startElement('head');
// 寫入 title 標記
$xml->writeElement('title', 'exC-9');
// 建立 head 元素的結束標記
$xml->endElement();

// 建立 body 元素的開始標記
$xml->startElement('body');
// 寫入 p 標記
$xml->writeElement('p', '使用XMLWriter類別建立XML文件');
// 建立 body 元素的結束標記
$xml->endElement();

// 建立 html 元素的結束標記
$xml->endElement();
// 建立 XML 文件的結束標記
$xml->endDocument();
// 將目前的緩衝區內容寫入 test.xml 文件
$xml->flush();
?>