<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * Web app for querying database. 
 */

/*
select longdescs.bug_id,who,concat('[',bug_when,'|',creation_ts,']'),concat('t',type),
length(thetext),concat('att#',attach_id),ispatch from 
longdescs,attachments where longdescs.bug_id=attachments.bug_id 
and longdescs.bug_id in (209410,210561) 
order by bug_when;

#select bug_id,who,bug_when,comment_id,type,concat('.',extra_data),thetext from longdescs where bug_id=209410;

select who,bug_id,bug_when,login_name,realname,attach_id from bugs_activity as ACT, profiles as PROF where PROF.login_name like 'codeslave%' and PROF.userid = ACT.who order by bug_when ASC limit 10;
select who,bug_id,bug_when,login_name,realname,attach_id from bugs_activity as ACT, profiles as PROF where PROF.login_name like 'codeslave%' and PROF.userid = ACT.who order by bug_when DESC limit 10;

#select who,bug_id,bug_when,login_name,realname,attach_id from bugs_activity as ACT, profiles as PROF, attach_data as DATA where PROF.login_name like 'codeslave%' and PROF.userid = ACT.who AND DATA.id=bugs_activity.attach_id and attach_id not null and substr(thedata,0,30) like 'Fixed in %' order by bug_when DESC limit 10;

select who,bug_id,bug_when,login_name,realname,attach_id from bugs_activity as ACT, profiles as PROF where ACT.bug_id=209410 and PROF.userid = ACT.who limit 20;

select attach_id,bug_id,creation_ts,submitter_id,ispatch from attachments where submitter_id=8130 and bug_id >= 209410;

select id, ispatch, length(thedata),submitter_id from attach_data, attachments where attachments.attach_id=attach_data.id and attach_data.id in (82701,83148);

select count(login_name) from profiles;

select 
 products.name,components.name,profiles.login_name,bugs.bug_id,
 length(longdescs.thetext),length(attach_data.thedata) 
from
 products,components,profiles,bugs,longdescs,attachments,attach_data
where 
 bugs.component_id=components.id and bugs.product_id=products.id and
 bugs.bug_id=longdescs.bug_id and bugs.bug_id=attachments.bug_id and
 profiles.user_id=longdescs.who and profiles.user_id=attachments.submitter_id
 and attachments.attach_id=attach_data.id
 and bugs.bug_id=209410
limit 5;

select 
 products.name,components.name,profiles.login_name,bugs.bug_id,
 length(longdescs.thetext) 
from
 products,components,profiles,bugs,longdescs
where 
 bugs.component_id=components.id and bugs.product_id=products.id and
 bugs.bug_id=longdescs.bug_id and 
 profiles.user_id=longdescs.who 
 and bugs.bug_id=209410
limit 5;

select 
 products.name,components.name,profiles.login_name,bugs.bug_id,
 length(attach_data.thedata) 
from
 products,components,profiles,bugs,attachments,attach_data
where 
 bugs.component_id=components.id and bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and
 profiles.user_id=attachments.submitter_id
 and attachments.attach_id=attach_data.id
 and bugs.bug_id=209410
limit 5;


* */

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$theme = "Phoenix";

require_once "../web-api/bugzilla-common.inc.php";

$pageTitle = "Bugzilla Query";
$query = isset($_POST["query"]) ? stripslashes($_POST["query"]) : "";

print "<div id=\"midcolumn\">\n";

print "<h1>$pageTitle</h1>\n";
print "<i>Separate multiple queries with semi-colon (\";\")</i><br/>\n";

print '<form method=post><textarea style="font-size:10px" name=query rows=20 cols=80>' . $query . '</textarea><br/><input type=submit name="Submit" style="font-size:12px">' . "\n";

if ($query)
{
	print "<hr noshade size=\"1\" width=\"50%\"/>\n";
	print "<h1>Results</h1>\n";
   
	if (false!==strpos($query,";")) {
		$queries = explode(";",$query);
	} else {
		$queries = array($query);
	}
	foreach ($queries as $query) {
		$q = trim($query); 
		if ($q && !preg_match("/^#/",$q)) { 
			print "<pre>"; displayQuery($q); print "</pre>\n";
		}
	}
}

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";
	
print "<div class=\"sideitem\">\n";
print "<h6>Help</h6>\n";
print "<p><ul><li><a href=\"schema.php\">Database Schema</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/plan/query.php\">Sample Queries</a></li></ul></p>\n";
print "</div>\n";
	
print "</div>\n"; // rightcolumn

print "</div>\n"; 

$html = ob_get_contents();
ob_end_clean();

$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>