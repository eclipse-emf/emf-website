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

# ---------------------

select
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 count(longdescs.thetext),
 concat(sum(length(longdescs.thetext)),"b")
from
 products,profiles,bugs,longdescs
where 
 bugs.product_id=products.id and bugs.bug_id=longdescs.bug_id and
 profiles.userid=longdescs.who and 
 bugs.bug_id=209408
group by committer,domain
order by committer,domain
limit 100; # num/size comments;

select 
 longdescs.bug_when, products.name, bugs.bug_id,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 concat(length(longdescs.thetext),"b") from
 products,profiles,bugs,longdescs
where 
 bugs.product_id=products.id and bugs.bug_id=longdescs.bug_id and
 profiles.userid=longdescs.who and 
 bugs.bug_id=209408
order by longdescs.bug_when,profiles.login_name
limit 100; # comments;

select 
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 count(attach_data.thedata),
 concat(sum(length(attach_data.thedata)),"b"),
 if(attachments.ispatch=1,"PATCH","") as patch
from
 products,profiles,bugs,attachments,attach_data
where 
 bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and attachments.attach_id=attach_data.id and
 profiles.userid=attachments.submitter_id and
 bugs.bug_id=209408
group by committer,domain,patch
having patch in ("PATCH","")
order by committer,domain,patch
limit 100; # num/size attachments;

select 
attachments.creation_ts,  products.name, bugs.bug_id,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 concat(length(attach_data.thedata),"b"),
 if(attachments.ispatch=1,"PATCH","")
from
 products,profiles,bugs,attachments,attach_data
where 
 bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and attachments.attach_id=attach_data.id and
 profiles.userid=attachments.submitter_id and
 bugs.bug_id=209408
order by  attachments.creation_ts,profiles.login_name
limit 100; # attachments;

-----------------

# all comments, attachments, patches per committer:
(select
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(longdescs.thetext),
 sum(length(longdescs.thetext)),
 "COMMENT" as type
from
 products,profiles,bugs,longdescs
where 
 bugs.product_id=products.id and bugs.bug_id=longdescs.bug_id and
 profiles.userid=longdescs.who and 
 bugs.bug_id>=1 and profiles.login_name = 'codeslave@ca.ibm.com'
group by domain,committer
order by domain,committer,type) 
UNION
(select 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(attach_data.thedata),
 sum(length(attach_data.thedata)),
 if(attachments.ispatch=1,"PATCH","ATTACH") as type
from
 products,profiles,bugs,attachments,attach_data
where 
 bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and attachments.attach_id=attach_data.id and
 profiles.userid=attachments.submitter_id and
 bugs.bug_id>=1 and profiles.login_name = 'codeslave@ca.ibm.com'
group by domain,committer,type
order by domain,committer,type)

--------------------

# count committers
select
 count(SUBSTRING_INDEX(profiles.login_name,'@',-1)) as count_domains
from profiles;

# count committers per company
select
 DISTINCT SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain, count(SUBSTRING_INDEX(profiles.login_name,'@',1)) as count_domains_per_company
from profiles
group by domain
order by count_domains_per_company desc;

# all comments, attachments, patches per subcompany:
(select
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(longdescs.thetext),
 sum(length(longdescs.thetext)),
 "COMMENT" as type
from
 products,profiles,bugs,longdescs
where 
 bugs.product_id=products.id and bugs.bug_id=longdescs.bug_id and
 profiles.userid=longdescs.who and 
 bugs.bug_id>=1 and profiles.login_name like '%@ca.ibm.com'
group by domain,committer
order by domain,committer,type) 
UNION
(select 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(attach_data.thedata),
 sum(length(attach_data.thedata)),
 if(attachments.ispatch=1,"PATCH","ATTACH") as type
from
 products,profiles,bugs,attachments,attach_data
where 
 bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and attachments.attach_id=attach_data.id and
 profiles.userid=attachments.submitter_id and
 bugs.bug_id>=1 and profiles.login_name like '%@ca.ibm.com'
group by domain,committer,type
order by domain,committer,type)

# all comments, attachments, patches per company:
(select
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(longdescs.thetext),
 sum(length(longdescs.thetext)),
 "COMMENT" as type
from
 products,profiles,bugs,longdescs
where 
 bugs.product_id=products.id and bugs.bug_id=longdescs.bug_id and
 profiles.userid=longdescs.who and 
 bugs.bug_id>=1 and profiles.login_name like '%@%.ibm.com'
group by domain,committer
order by domain,committer,type) 
UNION
(select 
 SUBSTRING_INDEX(profiles.login_name,'@',-1) as domain,
 SUBSTRING_INDEX(profiles.login_name,'@',1) as committer, 
 count(attach_data.thedata),
 sum(length(attach_data.thedata)),
 if(attachments.ispatch=1,"PATCH","ATTACH") as type
from
 products,profiles,bugs,attachments,attach_data
where 
 bugs.product_id=products.id and
 bugs.bug_id=attachments.bug_id and attachments.attach_id=attach_data.id and
 profiles.userid=attachments.submitter_id and
 bugs.bug_id>=1 and profiles.login_name like '%@%.ibm.com'
group by domain,committer,type
having domain like '%ca.ibm.com'
order by domain,committer,type)


*/

$time_start = microtime(true);
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
print "<p>Elapsed:<br/>" . (microtime(true) - $time_start) . "s</p>\n";
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
print "<p align=\"right\">" . (microtime(true) - $time_start) . "s</p>\n";
?>