<link href="CSS/menu_left.css" rel="stylesheet" type="text/css" />
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/menu_left.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var dsPaper = new Spry.Data.XMLDataSet("<?php echo $_SESSION['owner']; ?>/paper.xml", "papers/paper", 
	   {useCache: false, loadInterval: 1000});
//-->
</script>
<table class="menu_left_style1">
  <tr>
    <td class="menu_left_style2">
      <a href="show_message.php" class="menu_left_style3">
        留言版
      </a>
    </td>
  </tr>
  <tr>
    <td class="menu_left_style2">
      <a href="show_photo.php" class="menu_left_style3">
        部落格相簿
      </a>
    </td>
  </tr>
  <tr>
    <td class="menu_left_style2">
      最新文章
    </td>
  </tr>
  <tr>
    <td class="menu_left_style2">
      <div spry:region="dsPaper">
        <table class="menu_left_style4">
          <tr spry:repeat="dsPaper">
            <td class="menu_left_style5">
              <a onclick="showPaper('{ds_RowID}')" class="menu_left_style3">
                {subject}
              </a>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>