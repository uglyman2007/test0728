<?php
$link = pg_connect("host=localhost port=5432 dbname=ch16 user=daniel 
password=123456");
if (!$link)
   die ('無法建立PostgreSQL資料庫的連線');
   
echo "連線成功";
pg_close($link);
?>