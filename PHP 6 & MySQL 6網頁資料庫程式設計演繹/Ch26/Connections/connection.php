<?php
// �إ� MySQL ��Ʈw���s�u
$connection = mysql_connect('localhost', 'daniel', '123456') or 
	trigger_error(mysql_error(), E_USER_ERROR);
// �]�w�b�Τ�ݨϥ�UTF-8���r����
mysql_set_charset('utf8', $connection);
?>