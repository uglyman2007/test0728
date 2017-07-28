<?php
if ($db = sqlite_open('ch17', $msg))
	echo "成功建立SQLite資料庫ch17";
else
    die($msg);

sqlite_close($db);
?>