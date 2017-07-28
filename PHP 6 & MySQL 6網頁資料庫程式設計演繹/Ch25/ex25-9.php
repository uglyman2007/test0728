<?php
if (isset($_GET["file"]))
{
	@readfile($_GET["file"]);
}
?>