function removePhoto(name)
{
	var req = Spry.Utils.loadURL("GET", "remove_photo.php?name=" + escape(name), false);
}