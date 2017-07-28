<?php require_once('get_file.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>檔案的上傳與下載</title>
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="JavaScript/index.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var dsDirs = new Spry.Data.XMLDataSet("xml/dirs.xml", "dirs/dir", {useCache:false});
	var dsFiles = new Spry.Data.XMLDataSet("xml/{dsDirs::url}", "files/file", {sortOnLoad:"filetype", useCache:false});
//-->
</script>
</head>
<body>
<table class="index_style1">
  <tr>
    <td class="index_style2">
      網站檔案管理
    </td>
  </tr>
</table>
<table class="index_style3">
  <tr>
    <td class="index_style4">
	  <form method="post" class="index_style5">
	    <input name="download" id="download" type="button" value="下載" class="index_style6" onclick="download_file();" />
	  	<input name="delete" id="delete" type="button" value="刪除" class="index_style6" onclick="delete_file();" />
	  </form>
    </td>
  </tr>
</table>
<table class="index_style7">
  <tr>
    <td class="index_style8">
      <div spry:region="dsDirs">
        <table class="index_style9">
          <tr spry:repeat="dsDirs" spry:setrow="dsDirs" spry:hover="index_style10" spry:select="index_style11" 
            onclick="dsDirs.setCurrentRow('{ds_RowID}'); document.getElementById('select_dir').value='{dirname}';">
            <td class="index_style12">
              <img src="Photo/closedir.jpg" class="index_style18" />
            </td>
            <td>
              {dirname}
            </td>
          </tr>
        </table>
      </div>
    </td>
    <td class="index_style13">
      <div spry:region="dsFiles">
        <table class="index_style9">
          <tr spry:repeat="dsFiles" spry:setrow="dsFiles" spry:hover="index_style10" spry:select="index_style11">
            <td class="index_style14">
              <img src="Photo/dir.jpg" spry:if="'{filetype}'=='dir';" class="index_style18" />
              <img src="Photo/file.jpg" spry:if="'{filetype}'=='file';" class="index_style18" />
            </td>
            <td class="index_style15" spry:if="'{filetype}'=='file';"
              onclick="document.getElementById('select_file').value='{filename}';">
              {filename}       
            </td>
            <td class="index_style15" spry:if="'{filetype}'!='file';" 
              onclick="document.getElementById('select_file').value='not a file';">
              {filename}       
            </td>
            <td class="index_style16" spry:if="'{filetype}'=='file';"
              onclick="document.getElementById('select_file').value='{filename}';">
              {filesize} KB 
			</td>
            <td class="index_style16" spry:if="'{filetype}'!='file';" 
              onclick="document.getElementById('select_file').value='not a file';">&nbsp;                            
            </td>
            <td class="index_style17" spry:if="'{filetype}'=='file';" 
              onclick="document.getElementById('select_file').value='{filename}';">
              {filetime}            
            </td>
            <td class="index_style17" spry:if="'{filetype}'!='file';"  
              onclick="document.getElementById('select_file').value='not a file';">
              {filetime}            
            </td>
          </tr>
        </table>
      </div> 
    </td>
    <td class="index_style19">
	  <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <table>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
	      </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
		  <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style20">
              <input name="file[]" id="file[]" type="file" size="28" />
			</td>
          </tr>
          <tr>
            <td class="index_style22">
              <input type="submit" value="上傳檔案" />
		    </td>
          </tr>
        </table>
        <input name="select_dir" id="select_dir" type="hidden" value="." />
        <input name="select_file" id="select_file" type="hidden" />
      </form>
    </td>
  </tr>
</table>
<table class="index_style21">
  <tr>
    <td class="index_style2">&nbsp;      
    </td>
  </tr>
</table>
</body>
</html>