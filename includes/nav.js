function goBugzLink() {
	var collist = "%26query_format%3Dadvanced&column_changeddate=on&column_bug_severity=on&column_priority=on&column_rep_platform=on&column_bug_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_short_short_desc=on&splitheader=0";
	document.location.href='https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id'+collist;
}