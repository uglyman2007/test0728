<?php
// �إ�MySQL��Ʈw���s�u
$link = mysql_connect('localhost', 'daniel', '123456');
// �ˬdMySQL��Ʈwch15�O�_�w�g�s�b
$db_selected = mysql_select_db('ch15', $link);

if ($db_selected)
{
	// �]�w�إ߸�ƪ�class��SQL�d�ߦ�
	$query = "CREATE TABLE `class` 
	          (
				  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				  `name` VARCHAR(10) NOT NULL,
				  `address` VARCHAR(120) NOT NULL,
				  `birthday` DATE NOT NULL,
				  `math` TINYINT NOT NULL,
				  `english` TINYINT NOT NULL,
				  `history` TINYINT NOT NULL,
				  `total` SMALLINT NOT NULL
 			  );";
	// ����SQL�d�ߦ�
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '���� SQL �d�ߦ����� : ' . mysql_error();
	    exit;
	}
	echo "���\�إ߸�ƪ�class";
}
else
{
	echo "��Ʈwch15���s�b";
}

// ���� MySQL ��Ʈw���s�u
mysql_close($link);
?>