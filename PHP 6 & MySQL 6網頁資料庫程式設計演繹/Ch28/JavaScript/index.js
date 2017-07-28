// 下載選取的檔案
function download_file()
{
	// 下載檔案所在的資料夾
	var dir = document.getElementById("select_dir").value;
	// 要下載的檔案
	var file = document.getElementById("select_file").value;
	
	if (file == "not a file") {
		alert("資料夾不能下載!");
	}
	else {
		location.href = "download_file.php?dir=" + escape(dir) + "&file=" + escape(file);
	}
}
// 刪除選取的檔案
function delete_file()
{
	// 檔案所在的資料夾
	var dir = document.getElementById("select_dir").value;
	// 要刪除的檔案
	var file = document.getElementById("select_file").value;
	
	if (file == "not a file")
	{
		alert("資料夾不能刪除!");
	}
	else
	{
		if (confirm("您確定要刪除『" + file + "』嗎?"))
		{
			location.href = "delete_file.php?dir=" + escape(dir) + "&file=" + escape(file);
		}
	}
}