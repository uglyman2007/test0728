<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<link href="CSS/owner.css" rel="stylesheet" type="text/css" />
<table class="owner_style1">
  <tr>
    <td class="owner_style2">
      <span class="owner_style3">暱稱 : </span>
      <span class="owner_style4">
        <?php echo $_SESSION['name']; ?>
      </span>
    </td>
    <td class="owner_style5">
      <span class="owner_style3">性別 : </span>
      <span class="owner_style4">
        <?php echo $_SESSION['sex']; ?>
      </span>
    </td>
  </tr>
</table>