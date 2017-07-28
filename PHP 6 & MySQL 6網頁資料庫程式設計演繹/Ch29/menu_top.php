<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<link href="CSS/menu_top.css" rel="stylesheet" type="text/css" />
<table class="menu_top_style1">
  <tr>
    <td class="menu_top_style2">      
      <table class="menu_top_style3">
        <tr>
          <td class="menu_top_style4">
            <?php echo $_SESSION['owner']; ?> 的部落格     
          </td>
          <td class="menu_top_style5">
            <a href="post_message.php" class="menu_top_style6">我要留言</a>
          </td>
          <td class="menu_top_style5">
            <a href="post_paper.php" class="menu_top_style6">發表文章</a>
          </td>
          <td class="menu_top_style5">
            <a href="post_photo.php" class="menu_top_style6">上傳相片</a>
          </td>
        </tr>
      </table>
      <table class="menu_top_style7">
        <tr>
          <td class="menu_top_style8">
            旅行真是一件奇妙的事，開心地旅行是我人生的目標。歡迎加入我的旅遊世界，一起探索奇秒的人生旅程！ 
          </td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
  <table class="menu_top_style1">
    <tr>
      <td class="menu_top_style9">
        <!-- 載入左邊區塊 -->
        <?php require_once("menu_left.php"); ?>
      </td>
      <td class="menu_top_style10">