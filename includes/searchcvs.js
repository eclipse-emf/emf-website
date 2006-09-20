function setquery()
{
	proj = document.getElementById("project");
	q = document.getElementById("qb");

	if (proj.value == 1)
	{
		reg = /((?:project|module): ?)\S+/;
		if (reg.test(q.value))
		{
			q.value = q.value.replace(reg, "$1" + proj[proj.selectedIndex].innerHTML);
		}
		else
		{
			q.value += (q.value == "" ? "" : " ") + "project: " + proj[proj.selectedIndex].innerHTML;
		}
	}
}
