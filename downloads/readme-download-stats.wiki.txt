= Querying & Collating Eclipse.org Project Download Stats =

With a few simple steps, you can get [http://www.eclipse.org/emf/downloads/downloads.php download statistics] for your project like this:

<table>
<tr valign="top">
	<td>[[Image:Download_stats_some_countries.gif]]</td>
	<td>[[Image:Download_stats_2week_trend.gif]]</td>
	<td>[[Image:Download_stats_some_files.gif]]</td>
</tr>
</table>

This engine consists of 4 pieces:

* ''<tt style="color:DarkGreen">stats.php</tt>''
** script to query sql tables and return html/xml
* ''<tt style="color:DarkGreen">genXML.sh(.txt)</tt>''
** shell script to generate data from above php script
* ''<tt style="color:DarkGreen">downloads.php</tt>''
** php script to collate/sort/filter stored data
* ''<tt style="color:DarkGreen">xml/nightly/*.xml</tt>'', 
''<tt style="color:DarkGreen">xml/weekly/*.xml</tt>'', 
''<tt style="color:DarkGreen">xml/monthly/*.xml</tt>''
** sample (real) data for EMF, Jan 01 - Mar 02, 2006.

The above code is in CVS here: 

''<tt style="color:DarkGreen">anonymous@dev.eclipse.org:/cvsroot/org.eclipse/www/emf/downloads/</tt>''

Below are the three steps required to set up some or all of these tools. Note that for graphics (TLD icons and bars) you will also need to copy image files from here:

''<tt style="color:DarkGreen">anonymous@dev.eclipse.org:/cvsroot/org.eclipse/www/emf/images/</tt>''

== Step 1: Query On Demand ==
	
1. Install ''<tt style="color:DarkGreen">stats.php</tt>'' on your website, eg. commit it to
''<tt style="color:DarkGreen">/cvsroot/org.eclipse/www/emf/downloads/stats.php</tt>'' so that 
it's accessible via http as http://www.eclipse.org/emf/downloads/stats.php

2. Register it with the webmaster so that you will have access to the 
SQL class, '''dbconnection_downloads_ro.class.php'''. Without this, the queries
will fail.

3. Tweak the script using your own username/password restrictions, and set 
your own filenames for which to query.

4. When you are satisfied with the queries, displayed as either HTML or XML,
you can now automate the nightly/weekly/monthly collection of data snapshots.

== Step 2: Query On Schedule / Archived Snapshots ==

1. Install ''<tt style="color:DarkGreen">genXML.sh.txt</tt>'' on some linux-capable machine 
(native or cygwin). Rename it to ''<tt style="color:DarkGreen">genXML.sh</tt>'' and set it 
executable ('''<tt style="color:DarkRed">chmod 700 genXML.sh</tt>'''). 

2. Check that the script works - you will need ''bash'' and ''wget'' installed on your linux 
system. Run the script w/o options ('''<tt style="color:DarkRed">./genXML.sh</tt>''') to see 
its usage instructions. You can also read the script to see additional crontab examples.

3. To install the script to your crontab, edit your crontab and add entries for what you'd 
like to do - set a nightly, weekly, monthly schedule for when you want to collect new data. 
('''<tt style="color:DarkRed">crontab -e</tt>''')

4. For example, you can copy the following 6 lines into your crontab:

==== crontab entries ====

<pre>
   # nightly stats (previous day) @ 6am, do yesterday's data
   00 6 * * * ~/crontab/genXML.N.sh > /dev/null
   
   # weekly (previous week, starting on Sunday) @ 6:20am on Sunday, do previous week's data
   20 6 * * 0 ~/crontab/genXML.W.sh > /dev/null
   
   # monthly (previous full month) @ 6:40am on 1rst of the month, do prev month's data
   40 6 1 * * ~/crontab/genXML.M.sh > /dev/null
</pre>

5. The above-referenced scripts are wrappers for ''<tt style="color:DarkGreen">genXML.sh</tt>''. Create them thus:

==== ~/crontab/genXML.N.sh ====

<pre>
   ~/crontab/genXML.sh -user emf-dev -pass trilobyt3 -F -D -C -dates \
     `date --date="$(date +%Y-%m-%d) -1 day" +%Y%m%d` -l \
     /var/www/emf/downloads/xml/nightly 2>&1 | tee ~/crontab/logs/genXML.N.log.txt

   ~/crontab/genXML.sh -uml2 -user emf-dev -pass trilobyt3 -F -D -C -dates \
     `date --date="$(date +%Y-%m-%d) -1 day" +%Y%m%d` -l \
     /var/www/uml2/downloads/xml/nightly 2>&1 | tee ~/crontab/logs/genXML.N.log.txt
</pre>

==== ~/crontab/genXML.W.sh ====

<pre>
   ~/crontab/genXML.sh -user emf-dev -pass trilobyt3 -F -D -C -weeks \
     `date --date="$(date +%Y-%m-%d) -1 week" +%U` -l \
     /var/www/emf/downloads/xml/weekly 2>&1 | tee ~/crontab/logs/genXML.W.log.txt

   ~/crontab/genXML.sh -uml2 -user emf-dev -pass trilobyt3 -F -D -C -weeks \
     `date --date="$(date +%Y-%m-%d) -1 week" +%U` -l \
     /var/www/uml2/downloads/xml/weekly 2>&1 | tee ~/crontab/logs/genXML.W.log.txt
</pre>

==== ~/crontab/genXML.M.sh ====

<pre>
   ~/crontab/genXML.sh -user emf-dev -pass trilobyt3 -F -D -C -months \
     `date --date="$(date +%Y-%m-15) -1 month" +%m` -l \
     /var/www/emf/downloads/xml/monthly 2>&1 | tee ~/crontab/logs/genXML.M.log.txt

   ~/crontab/genXML.sh -uml2 -user emf-dev -pass trilobyt3 -F -D -C -months \
     `date --date="$(date +%Y-%m-15) -1 month" +%m` -l \
     /var/www/uml2/downloads/xml/monthly 2>&1 | tee ~/crontab/logs/genXML.M.log.txt
</pre>

== Step 3: Displaying, Comparing, Plotting & Collating Archived Snapshot Data ==

1. To view your stored data in different ways, you can use 
''<tt style="color:DarkGreen">downloads.php</tt>''. This should be installed next to wherever your data is collected, 
eg., if you have a webserver with a ''<tt style="color:DarkGreen">/var/www/</tt>'' root, and you place your data into 
''<tt style="color:DarkGreen">/var/www/emf/downloads/xml/</tt>'', this file should be 
''<tt style="color:DarkGreen">/var/www/emf/downloads/downloads.php</tt>''.

For a real-world example, go here: http://www.eclipse.org/emf/downloads/downloads.php

2. You can customize the way the Files By Type grouping works to suit your specific file names by editing the function getFileType($url). 
For the EMF case, this is:

==== downloads.php#getFileType($url) ====

<pre>
   function getFileType($url) {
     $matches = array(
       "Standalone Zip"  => "emf-sdo-xsd-Standalone-",
       "Full SDK Zip" 	 => "emf-sdo-xsd-SDK-",
       "EMF SDK Zip" 	 => "emf-sdo-SDK-",
       "EMF RT Zip" 	 => "emf-sdo-runtime-",
       "EMF Update Manager Jar" 	 => "org.eclipse.emf.ecore", 
       "XSD SDK Zip" 	 => "xsd-SDK-",
       "XSD RT Zip" 	 => "xsd-runtime-",
       "XSD Update Manager Jar" 	 => "org.eclipse.xsd");
	 foreach ($matches as $label => $match) {
       if (false!==strpos($url,$match)) return $label;	
     } 
     return "Other Files";
   }
</pre>

--~~~~
