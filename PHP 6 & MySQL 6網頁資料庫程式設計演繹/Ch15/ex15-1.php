<?php
// �إ�MySQL��Ʈw���s�u
$link = mysql_connect('localhost', 'daniel', '123456');
// �ˬdMySQL��Ʈwch15�O�_�w�g�s�b
$db_selected = mysql_select_db('ch15', $link);

if (!$db_selected)
{
	// �]�w�إ߸�Ʈwch15��SQL�d�ߦ�
	$query = "CREATE DATABASE IF NOT EXISTS `ch15` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	// ����SQL�d�ߦ�
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '���� SQL �d�ߦ����� : ' . mysql_error();
	    exit;
	}
	echo "���\�إ߸�Ʈwch15";
}
else
{
	echo "��Ʈwch15�w�g�s�b";
}

// ���� MySQL ��Ʈw���s�u
mysql_close($link);
?>