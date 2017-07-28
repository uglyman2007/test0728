<link href="CSS/chatter.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
  var dsChatter = new Spry.Data.XMLDataSet("xml/chatter.xml", "chatters/chatter", {useCache: false, loadInterval: 10000 });
  var dsChatter_count = new Spry.Data.XMLDataSet("xml/chatter_count.xml", "chatters", {useCache: false, loadInterval: 10000 });
//-->
</script>
<table class="chatter_style1">
  <tr>
    <td class="chatter_style2">
      <span class="chatter_style3">
        線上訪客名單
      </span>
    </td>
  </tr>
  <tr>
    <td>
      <div spry:region="dsChatter_count">
        <span class="chatter_style4">男 : </span>
        <span class="chatter_style5">{man}</span>
        <span class="chatter_style4">女 : </span>
        <span class="chatter_style5">{woman}</span>
        <span class="chatter_style4">總人數 : </span>
        <span class="chatter_style5">{total}</span>
      </div>
    </td>
  </tr>
  <tr>
    <td class="chatter_style6">
      <div spry:region="dsChatter" class="chatter_style7">
        <table class="chatter_style8">
          <tr spry:repeat="dsChatter">
            <td class="chatter_style9" spry:if="'{sex}'=='男'">
              <span class="chatter_style10">♀</span>
              <span class="chatter_style11">{name}</span>
            </td>
            <td class="chatter_style9" spry:if="'{sex}'=='女'">
              <span class="chatter_style12">♂</span>
              <span class="chatter_style11">{name}</span>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>