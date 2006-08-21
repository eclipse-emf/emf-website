function toggle(eid)
{
	buglist = document.getElementById(eid);
	togtext = document.getElementById(eid + "-tog");

	if (buglist.style.display == "none")
	{
		buglist.style.display = "";
		togtext.innerHTML = "hide bug numbers";
	}
	else
	{
		buglist.style.display = "none";
		togtext.innerHTML = "show bug numbers";
	}
}
