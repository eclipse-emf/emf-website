<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
<?php include_once "release-notes-form-controls.xml"; ?>
<div class="homeitem3col"><h3><a class="projtitle" href="#emf">EMF &amp; SDO Release Notes</a></h3><ul><li class="header"><div class="fr">Bugs Closed</div></li>
<li><div class="cb"><div class="fr">0</div><b>2.0.5 Release</b></div><div style="display:none" id="emf-2.0.5"><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.5-tog" href="javascript:toggle('emf-2.0.5')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">2</div><b>2.0.4 Release</b></div><div style="display:none" id="emf-2.0.4"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=105533&amp;Bugzilla=105533"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105533" target="_bugz">105533</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.4-tog" href="javascript:toggle('emf-2.0.4')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">6</div><b>2.0.3 Release</b></div><div style="display:none" id="emf-2.0.3"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=96106&amp;Bugzilla=96106"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96106" target="_bugz">96106</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=91325&amp;Bugzilla=91325"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=91325" target="_bugz">91325</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.3-tog" href="javascript:toggle('emf-2.0.3')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">11</div><b>2.0.2 Release</b></div><div style="display:none" id="emf-2.0.2"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=87219&amp;Bugzilla=87219"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87219" target="_bugz">87219</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=85555&amp;Bugzilla=85555"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=85555" target="_bugz">85555</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=84182&amp;Bugzilla=84182"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=84182" target="_bugz">84182</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83050&amp;Bugzilla=83050"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83050" target="_bugz">83050</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83049&amp;Bugzilla=83049"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83049" target="_bugz">83049</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83048&amp;Bugzilla=83048"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83048" target="_bugz">83048</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83047&amp;Bugzilla=83047"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83047" target="_bugz">83047</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83046&amp;Bugzilla=83046"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83046" target="_bugz">83046</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83045&amp;Bugzilla=83045"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83045" target="_bugz">83045</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=83044&amp;Bugzilla=83044"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83044" target="_bugz">83044</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.2-tog" href="javascript:toggle('emf-2.0.2')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">53</div><b>2.0.1 Release</b></div><div style="display:none" id="emf-2.0.1"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72875" target="_bugz">72875</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72731" target="_bugz">72731</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72675" target="_bugz">72675</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72645" target="_bugz">72645</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72565" target="_bugz">72565</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72538" target="_bugz">72538</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72428" target="_bugz">72428</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72265" target="_bugz">72265</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72254" target="_bugz">72254</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72204" target="_bugz">72204</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72194" target="_bugz">72194</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72056" target="_bugz">72056</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72014" target="_bugz">72014</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71834" target="_bugz">71834</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71681" target="_bugz">71681</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71599" target="_bugz">71599</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71597" target="_bugz">71597</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71580" target="_bugz">71580</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71565" target="_bugz">71565</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71523" target="_bugz">71523</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71509" target="_bugz">71509</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71487" target="_bugz">71487</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71465" target="_bugz">71465</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71314" target="_bugz">71314</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71305" target="_bugz">71305</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71034" target="_bugz">71034</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70789" target="_bugz">70789</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70583" target="_bugz">70583</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70563" target="_bugz">70563</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70560" target="_bugz">70560</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70559" target="_bugz">70559</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70423" target="_bugz">70423</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70031" target="_bugz">70031</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69680" target="_bugz">69680</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69576" target="_bugz">69576</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69525" target="_bugz">69525</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69270" target="_bugz">69270</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69029" target="_bugz">69029</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68564" target="_bugz">68564</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67708" target="_bugz">67708</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.1-tog" href="javascript:toggle('emf-2.0.1')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">171</div><b>2.0.0 Release</b></div><div style="display:none" id="emf-2.0.0"><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68465" target="_bugz">68465</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68310" target="_bugz">68310</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68256" target="_bugz">68256</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68200" target="_bugz">68200</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68198" target="_bugz">68198</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68068" target="_bugz">68068</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67992" target="_bugz">67992</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67863" target="_bugz">67863</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67860" target="_bugz">67860</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67826" target="_bugz">67826</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67783" target="_bugz">67783</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67748" target="_bugz">67748</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67720" target="_bugz">67720</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67635" target="_bugz">67635</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67493" target="_bugz">67493</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67445" target="_bugz">67445</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67162" target="_bugz">67162</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66944" target="_bugz">66944</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66367" target="_bugz">66367</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66361" target="_bugz">66361</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66118" target="_bugz">66118</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66038" target="_bugz">66038</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66037" target="_bugz">66037</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65730" target="_bugz">65730</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65725" target="_bugz">65725</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65700" target="_bugz">65700</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65605" target="_bugz">65605</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65082" target="_bugz">65082</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65064" target="_bugz">65064</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64734" target="_bugz">64734</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64535" target="_bugz">64535</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64374" target="_bugz">64374</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64309" target="_bugz">64309</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64217" target="_bugz">64217</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63821" target="_bugz">63821</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63497" target="_bugz">63497</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63117" target="_bugz">63117</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63079" target="_bugz">63079</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62988" target="_bugz">62988</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62898" target="_bugz">62898</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62471" target="_bugz">62471</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62452" target="_bugz">62452</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62275" target="_bugz">62275</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62181" target="_bugz">62181</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62030" target="_bugz">62030</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62026" target="_bugz">62026</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62025" target="_bugz">62025</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61929" target="_bugz">61929</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61816" target="_bugz">61816</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61711" target="_bugz">61711</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61640" target="_bugz">61640</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61601" target="_bugz">61601</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61595" target="_bugz">61595</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61503" target="_bugz">61503</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61502" target="_bugz">61502</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61501" target="_bugz">61501</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61500" target="_bugz">61500</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61495" target="_bugz">61495</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61493" target="_bugz">61493</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61465" target="_bugz">61465</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61302" target="_bugz">61302</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61210" target="_bugz">61210</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60854" target="_bugz">60854</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60731" target="_bugz">60731</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60603" target="_bugz">60603</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60602" target="_bugz">60602</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60151" target="_bugz">60151</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59688" target="_bugz">59688</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59637" target="_bugz">59637</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59582" target="_bugz">59582</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59536" target="_bugz">59536</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59465" target="_bugz">59465</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59240" target="_bugz">59240</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58472" target="_bugz">58472</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58244" target="_bugz">58244</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58208" target="_bugz">58208</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58132" target="_bugz">58132</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57865" target="_bugz">57865</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57707" target="_bugz">57707</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57669" target="_bugz">57669</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57654" target="_bugz">57654</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57653" target="_bugz">57653</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57616" target="_bugz">57616</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57593" target="_bugz">57593</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57474" target="_bugz">57474</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57444" target="_bugz">57444</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57315" target="_bugz">57315</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57038" target="_bugz">57038</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56919" target="_bugz">56919</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56647" target="_bugz">56647</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56190" target="_bugz">56190</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56137" target="_bugz">56137</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55955" target="_bugz">55955</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55829" target="_bugz">55829</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55587" target="_bugz">55587</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55577" target="_bugz">55577</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55463" target="_bugz">55463</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55462" target="_bugz">55462</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55379" target="_bugz">55379</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55276" target="_bugz">55276</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55263" target="_bugz">55263</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55152" target="_bugz">55152</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54706" target="_bugz">54706</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54702" target="_bugz">54702</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54367" target="_bugz">54367</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54271" target="_bugz">54271</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54112" target="_bugz">54112</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53806" target="_bugz">53806</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53772" target="_bugz">53772</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53453" target="_bugz">53453</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53180" target="_bugz">53180</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52312" target="_bugz">52312</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52174" target="_bugz">52174</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51917" target="_bugz">51917</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51204" target="_bugz">51204</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50782" target="_bugz">50782</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50176" target="_bugz">50176</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49269" target="_bugz">49269</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48838" target="_bugz">48838</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48721" target="_bugz">48721</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48447" target="_bugz">48447</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48417" target="_bugz">48417</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47999" target="_bugz">47999</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47718" target="_bugz">47718</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47497" target="_bugz">47497</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47434" target="_bugz">47434</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47432" target="_bugz">47432</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47327" target="_bugz">47327</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47201" target="_bugz">47201</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46803" target="_bugz">46803</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46230" target="_bugz">46230</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45660" target="_bugz">45660</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45606" target="_bugz">45606</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45605" target="_bugz">45605</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43957" target="_bugz">43957</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=42502" target="_bugz">42502</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41704" target="_bugz">41704</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40613" target="_bugz">40613</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40505" target="_bugz">40505</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39618" target="_bugz">39618</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38069" target="_bugz">38069</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="emf-2.0.0-tog" href="javascript:toggle('emf-2.0.0')">show bug numbers</a></div></li></ul></div><div class="homeitem3col"><h3><a class="projtitle" href="#xsd">XSD Release Notes</a></h3><ul><li class="header"><div class="fr">Bugs Closed</div></li>
<li><div class="cb"><div class="fr">1</div><b>2.0.5 Release</b></div><div style="display:none" id="xsd-2.0.5"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=118276&amp;Bugzilla=118276"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=118276" target="_bugz">118276</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.5-tog" href="javascript:toggle('xsd-2.0.5')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">1</div><b>2.0.4 Release</b></div><div style="display:none" id="xsd-2.0.4"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.4-tog" href="javascript:toggle('xsd-2.0.4')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">4</div><b>2.0.3 Release</b></div><div style="display:none" id="xsd-2.0.3"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.3-tog" href="javascript:toggle('xsd-2.0.3')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">1</div><b>2.0.2 Release</b></div><div style="display:none" id="xsd-2.0.2"><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.2-tog" href="javascript:toggle('xsd-2.0.2')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">15</div><b>2.0.1 Release</b></div><div style="display:none" id="xsd-2.0.1"><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73024" target="_bugz">73024</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
&#160;</div><div class="fl"><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72852" target="_bugz">72852</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72532" target="_bugz">72532</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72384" target="_bugz">72384</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72018" target="_bugz">72018</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71882" target="_bugz">71882</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71116" target="_bugz">71116</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69081" target="_bugz">69081</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.1-tog" href="javascript:toggle('xsd-2.0.1')">show bug numbers</a></div></li>
<li><div class="cb"><div class="fr">35</div><b>2.0.0 Release</b></div><div style="display:none" id="xsd-2.0.0"><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66327" target="_bugz">66327</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66232" target="_bugz">66232</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65703" target="_bugz">65703</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65672" target="_bugz">65672</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64864" target="_bugz">64864</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63916" target="_bugz">63916</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61736" target="_bugz">61736</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57686" target="_bugz">57686</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56812" target="_bugz">56812</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56328" target="_bugz">56328</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56269" target="_bugz">56269</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54289" target="_bugz">54289</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54203" target="_bugz">54203</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53776" target="_bugz">53776</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53421" target="_bugz">53421</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50222" target="_bugz">50222</a>,
&#160;</div><div class="fl"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49692" target="_bugz">49692</a>,
&#160;</div><div class="fl">&#9632;</div></div><div class="cb"><a id="xsd-2.0.0-tog" href="javascript:toggle('xsd-2.0.0')">show bug numbers</a></div></li></ul></div><div class="homeitem3col"><h3>EMF &amp; SDO Release Notes<a name="emf">&nbsp;</a></h3><ul><li class="release">2.0.5 Release
						</li><li class="outerli">2.0.5 Release</li><li class="outerli">2.0.5RC1</li><li class="release">2.0.4 Release
						&#160;(2 Bugs)</li><li class="outerli">2.0.4 Release</li><li class="outerli">2.0.4&#160;M200509081011 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>&#160;[Dupe] Fix JDK5.0 compiler errors</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=105533&amp;Bugzilla=105533"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=105533" target="_bugz">105533</a>&#160;[Dupe] ESuperAdapter holds onto references forever == memory leak</li></ul></li><li class="release">2.0.3 Release
						&#160;(6 Bugs)</li><li class="outerli">2.0.3 Release (4 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>&#160;notice.html missing from XSD zips</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>&#160;notice.html missing from EMF zips</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>&#160;Migrate license from CPL to EPL [2.0.3]</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>&#160;Migrate license from CPL to EPL [2.0.3]</li></ul></li><li class="outerli">2.0.3RC2a</li><li class="outerli">2.0.3RC2<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=91325&amp;Bugzilla=91325"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=91325" target="_bugz">91325</a>&#160;Threads &amp; EPackageImpl.getEClassifier()</li></ul></li><li class="outerli">2.0.3RC1<ul><li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=96106&amp;Bugzilla=96106"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=96106" target="_bugz">96106</a>&#160;Error getting SDO Object with concurrent mediations</li></ul></li><li class="release">2.0.2 Release
						&#160;(11 Bugs)</li><li class="outerli">2.0.2 Release</li><li class="outerli">2.0.2RC3</li><li class="outerli">2.0.2&#160;M200503081329<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=87219&amp;Bugzilla=87219"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=87219" target="_bugz">87219</a>&#160;[DUPE] %featureName? %providerName?</li></ul></li><li class="outerli">2.0.2RC2<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>&#160;[DUPE] xsd doc : toc.xml has invalid xml?</li></ul></li><li class="outerli">2.0.2&#160;M200502171209<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=85555&amp;Bugzilla=85555"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=85555" target="_bugz">85555</a>&#160;[DUPE] A data type called URI results in generated XyzPackageImpl that doesn't compile in the case of load initialization.</li></ul></li><li class="outerli">2.0.2&#160;M200502100700</li><li class="outerli">2.0.2&#160;M200502030700 (7 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=84182&amp;Bugzilla=84182"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=84182" target="_bugz">84182</a>&#160;[DUPE] ChangeSummary.isDeleted() fails after endLogging/beginLogging</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83050&amp;Bugzilla=83050"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83050" target="_bugz">83050</a>&#160;[DUPE] ClassCastException when saving a ChangeDescription with multivalue attribute.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83049&amp;Bugzilla=83049"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83049" target="_bugz">83049</a>&#160;[DUPE] EObject.eContainmentFeature may return wrong result for containment via an open content feature in a  feature map entry.</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83048&amp;Bugzilla=83048"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83048" target="_bugz">83048</a>&#160;[DUPE] getContainmentProperty() throws a NullPointerException</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83047&amp;Bugzilla=83047"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83047" target="_bugz">83047</a>&#160;[DUPE] EDate's createFromString/convertToString isn't thread safe.</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83046&amp;Bugzilla=83046"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83046" target="_bugz">83046</a>&#160;[DUPE] Inconsistent data access on List values</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83045&amp;Bugzilla=83045"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83045" target="_bugz">83045</a>&#160;[DUPE] Issue with containment and deleted objects</li></ul></li><li class="outerli">2.0.2&#160;M200501270700<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=83044&amp;Bugzilla=83044"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=83044" target="_bugz">83044</a>&#160;[DUPE] caching of Lookup in XMLSaveImpl for major performance boost of serialization</li></ul></li><li class="outerli">2.0.2&#160;M200501191212</li><li class="release">2.0.1 Release
						&#160;(53 Bugs)</li><li class="outerli">2.0.1 Release (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>&#160;Zip support is not working properly</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>&#160;Support for backup/secondary/multiple Update URL(s)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>&#160;Implementation of XMLSave does not scale</li></ul></li><li class="outerli">2.0.1RC2<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>&#160;Zip support is not working properly</li></ul></li><li class="outerli">2.0.1RC1 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>&#160;Support for backup/secondary/multiple Update URL(s)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>&#160;Implementation of XMLSave does not scale</li></ul></li><li class="outerli">2.0.1&#160;M200409011021 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72875" target="_bugz">72875</a>&#160;Validator class not generated for derived models which (only) inherit validation methods</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>&#160;[osgi] headers incorrectly cached when a bundle is installed from the update manager</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>&#160;ClassCastException occurs when calling applyAndRerverse()</li></ul></li><li class="outerli">2.0.1&#160;M200408261626 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72731" target="_bugz">72731</a>&#160;Stop encoding platform resource URI by default</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72565" target="_bugz">72565</a>&#160;Chicken and Egg problem in initialization</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>&#160;Extend SetCommand to individual EList members</li></ul></li><li class="outerli">2.0.1&#160;M200408260844 (6 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72675" target="_bugz">72675</a>&#160;EClassImpl has problem with multi threaded read access</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72645" target="_bugz">72645</a>&#160;Caching mechanism for URIs on ResourceSet (performance improvement)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72538" target="_bugz">72538</a>&#160;Performance: improve performance of BasicEList.get(int)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72428" target="_bugz">72428</a>&#160;Invalid validation code generated for minLength / maxLength constrains</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72265" target="_bugz">72265</a>&#160;New save option w.r.t. xsi/xmi:type</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>&#160;Extend SetCommand to individual EList members</li></ul></li><li class="outerli">2.0.1&#160;M200408190924 (9 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72254" target="_bugz">72254</a>&#160;PackageNotFoundException in XMLHandler#getPackageForURI(String)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72204" target="_bugz">72204</a>&#160;&amp;quot;Initialize by Loading&amp;quot; attribute not reconciled</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72194" target="_bugz">72194</a>&#160;IllegalStateException when deleting DataObject with read-only EReference</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72056" target="_bugz">72056</a>&#160;XMLHandler.getPAckageForURI has problem with java: protocol</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72014" target="_bugz">72014</a>&#160;Negative xsd:durations are output incorrectly</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>&#160;Support frozen Ecore instances for improved performance</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71509" target="_bugz">71509</a>&#160;caching the costly to build eClassFeatureNamePairToEStructuralFeatureMap across deserializations.</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70563" target="_bugz">70563</a>&#160;Error using the xpath accessor when object doesn't exist</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69680" target="_bugz">69680</a>&#160;problems with '#' character in file or folder names</li></ul></li><li class="outerli">2.0.1&#160;M200408120834 (12 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>&#160;Support frozen Ecore instances for improved performance</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71834" target="_bugz">71834</a>&#160;Improve performance in ChangeRecorder.handlerFeature path</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71681" target="_bugz">71681</a>&#160;JMerge does not  attempt to invoke setFlags on interfaces</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71599" target="_bugz">71599</a>&#160;Improve performance of BasicEList.getNonDuplicates/getDuplicates for lists with useEquals false.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71597" target="_bugz">71597</a>&#160;Support XMLResource.OPTION_SCHEMA_LOCATION_IMPLEMENTATION to optionally save the generated package interface name</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71580" target="_bugz">71580</a>&#160;JavaJet creates templates that don't compile</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71565" target="_bugz">71565</a>&#160;TVT3.0:  Default window size for Referenced generator models too small</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71523" target="_bugz">71523</a>&#160;Avoid null pointer exception in GenBaseImpl.setImportManager</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71487" target="_bugz">71487</a>&#160;Criteria for Boolean property editor</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71465" target="_bugz">71465</a>&#160;Performance: SDO DataObject getters and setters</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71034" target="_bugz">71034</a>&#160;ChangeRecorder objects accumulating in eAdapters list</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70423" target="_bugz">70423</a>&#160;Make EChangeSummay=ry#isLogging non-transient</li></ul></li><li class="outerli">2.0.1&#160;M200408040957 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71314" target="_bugz">71314</a>&#160;Reference to empty enumeration will lead to failure during Model code generation</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71305" target="_bugz">71305</a>&#160;Race condition in ETypeImpl::getPropertiesGen</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68564" target="_bugz">68564</a>&#160;Enum code generation is bad</li></ul></li><li class="outerli">2.0.1&#160;M200407280859 (5 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70789" target="_bugz">70789</a>&#160;Validation: runtime dependency from org.eclipse.core.runtime.IStatus</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70583" target="_bugz">70583</a>&#160;Performance EObjectImpl and ChangeRecorder</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70560" target="_bugz">70560</a>&#160;Changing an object breaks old container</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70559" target="_bugz">70559</a>&#160;SDO: Deleting a DataObject should only process unsettable features</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70031" target="_bugz">70031</a>&#160;Getting a java.lang.IllegalArgumentException exception while generating XSD Schema</li></ul></li><li class="outerli">2.0.1&#160;M200407211027</li><li class="outerli">2.0.1&#160;M200407150937 (6 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69576" target="_bugz">69576</a>&#160;Named constraints are only validated at sub-classes</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69525" target="_bugz">69525</a>&#160;Codegen Failure in EMF 06280827 Level</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69270" target="_bugz">69270</a>&#160;Generate Schema action problems</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69029" target="_bugz">69029</a>&#160;SDO fails when using settings like setLong(data/value[i], 1)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67708" target="_bugz">67708</a>&#160;[JET] project&amp;gt;JET Settings&amp;gt;Template Containers should allow plugin references</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>&#160;Accessibility: FeatureEditorDialog not Accessible compliant: Text widget focus not readable</li></ul></li><li class="release">2.0.0 Release
						&#160;(171 Bugs)</li><li class="outerli">2.0.0 Release</li><li class="outerli">2.0.0&#160;I200406250129</li><li class="outerli">2.0.0&#160;I200406241017<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68465" target="_bugz">68465</a>&#160;Schema errors not linked to offending file</li></ul></li><li class="outerli">2.0.0&#160;I200406231126 (4 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68310" target="_bugz">68310</a>&#160;ChangeRecorder doesn't pick up new contents</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68256" target="_bugz">68256</a>&#160;NPE in XMLHelperImpl</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68200" target="_bugz">68200</a>&#160;IndexOutOfBoundsException in ChangeRecorder</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68198" target="_bugz">68198</a>&#160;Dirty flag does not work when undo-redo</li></ul></li><li class="outerli">2.0.0&#160;I200406221136 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>&#160;ClassCastException occurs when calling applyAndRerverse()</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=68068" target="_bugz">68068</a>&#160;JET Compiler not handling files from Linux correctly</li></ul></li><li class="outerli">2.0.0&#160;I200406211000 (8 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67992" target="_bugz">67992</a>&#160;Provide more flexibility in the package registry implementation</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>&#160;BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature) gives bad result for open content features</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67863" target="_bugz">67863</a>&#160;EcoreUtil.UsageCrossReferencer ignores derived features</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67860" target="_bugz">67860</a>&#160;ItemPropertyDescriptor#getPropertyValue(Object) should not call eIsSet() for attributes</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67826" target="_bugz">67826</a>&#160;SDO Editor broken for several reasons</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67783" target="_bugz">67783</a>&#160;Support caching of extended metadata</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67748" target="_bugz">67748</a>&#160;(STATIC)ChangeSummary.setting.getValue() returns null for date</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67720" target="_bugz">67720</a>&#160;Jar-like archive URI behaviour for zip and other schemes</li></ul></li><li class="outerli">2.0.0&#160;I200406171028 (6 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67635" target="_bugz">67635</a>&#160;Add utility methods to create QName objects</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67493" target="_bugz">67493</a>&#160;bad trailing null character at the end in base64 type</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67445" target="_bugz">67445</a>&#160;GenClassImpl#getSharedClassCreateChildFeatures() is non-deterministic</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67162" target="_bugz">67162</a>&#160;RCP Application</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66944" target="_bugz">66944</a>&#160;Incorrect order of parameters in call to this in ItemPropertyDescriptor causes null Category and broken static image</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>&#160;Fix EMF editors to avoid new null selection assertion in SelectionChangedEvent in RC2</li></ul></li><li class="outerli">2.0.0&#160;I200406100948 (16 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66367" target="_bugz">66367</a>&#160;DataObject.createDataObject for open content feature in repeating wildcard breaks</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>&#160;Accessibility: FeatureEditorDialog not Accessible compliant: Text widget focus not readable</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66361" target="_bugz">66361</a>&#160;Accessibility: LoadResourceDialog not Accessible compliant:  Text overwrites button</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>&#160;Avoid the use of CCombo in the generated wizards.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>&#160;Support ecore:ignore for facets, XSDAnnotation, &amp;lt;documentation&amp;gt;, and &amp;lt;appinfo&amp;gt;.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66118" target="_bugz">66118</a>&#160;Platform.resolve() does not produce a hierarchical URI</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>&#160;Complete the support for validating according to XML Schema simple facets</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66038" target="_bugz">66038</a>&#160;hrefs missing after saving recorded unknown features</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66037" target="_bugz">66037</a>&#160;schemaLocation bypassed when using extended metadata</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>&#160;Add activities to EMF and XSD</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65730" target="_bugz">65730</a>&#160;ArrayIndexOutOfBoundsException in BasicCommandStack</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65725" target="_bugz">65725</a>&#160;ClassCastException in ChangeRecorder</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65700" target="_bugz">65700</a>&#160;Exception calling hasPrevious in ListIterator</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65605" target="_bugz">65605</a>&#160;Problem with SDOUtil.setInt()</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>&#160;JMerge: pull of exception, superclass don't work if getter returns null</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>&#160;Generate deployable plug-ins</li></ul></li><li class="outerli">2.0.0&#160;I200406030436 (18 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>&#160;JMerge: pull of exception, superclass don't work if getter returns null</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65082" target="_bugz">65082</a>&#160;nsPrefix ignored in EMOF file</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65064" target="_bugz">65064</a>&#160;NPE in EMFPlugin#getString(String)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64734" target="_bugz">64734</a>&#160;EEnumLiterals (and Booleans) not localized</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64535" target="_bugz">64535</a>&#160;ItemProvider.factorAddCommand should correct the index</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64374" target="_bugz">64374</a>&#160;JMerge: JPatternDictionary NullPointerException</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64309" target="_bugz">64309</a>&#160;generated model editor fails to create model and crashes</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64217" target="_bugz">64217</a>&#160;MappingRootImpl's createNotification() needs extra arg</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63821" target="_bugz">63821</a>&#160;IllegalArgumentException when opening properties view</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63497" target="_bugz">63497</a>&#160;Add XML Schema datatype validation for XMLTypeFactory</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63117" target="_bugz">63117</a>&#160;Proper static code generation for Store scenario</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>&#160;Enhancement to enable dynamic and generated EPackage usage across JVMs</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61210" target="_bugz">61210</a>&#160;Drag and Drop with non-containment references not working</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57593" target="_bugz">57593</a>&#160;64k method limit</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>&#160;Generate deployable plug-ins</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47327" target="_bugz">47327</a>&#160;source editor not dirty on D?D move</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47201" target="_bugz">47201</a>&#160;Generated editor permits save on readonly files</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=39618" target="_bugz">39618</a>&#160;Improve label feature search algorithm</li></ul></li><li class="outerli">2.0.0&#160;I200405200923 (11 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63079" target="_bugz">63079</a>&#160;ClassCastException when generating model code</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62988" target="_bugz">62988</a>&#160;Attribute wildcards do not work correctly.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62898" target="_bugz">62898</a>&#160;JavaEcoreBuilder: mark &amp;quot;dummy&amp;quot; EClasses as interfaces</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62471" target="_bugz">62471</a>&#160;FeatureMap.toArray() not implemented correctly</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62452" target="_bugz">62452</a>&#160;...provider.&amp;lt;model&amp;gt;EditPlugin class generated in wrong place</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>&#160;Support generator control over runtime compatibility and Rich Client Platform</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62275" target="_bugz">62275</a>&#160;CopyCommand should not copy unchangeable or derived features</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62181" target="_bugz">62181</a>&#160;EDataObject.getProperties() for static/dynamic properties</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61601" target="_bugz">61601</a>&#160;getOldContainer and getOldContainingProperty on EChangeSummary</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61595" target="_bugz">61595</a>&#160;Mark StructuralFeature  as &amp;quot;read-only&amp;quot;</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57865" target="_bugz">57865</a>&#160;The ok button can not be seen on the default size of &amp;quot;Import Primitive Type&amp;quot; window.</li></ul></li><li class="outerli">2.0.0&#160;I200405131028 (18 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62030" target="_bugz">62030</a>&#160;Add support for XML Schema QName datatype</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62026" target="_bugz">62026</a>&#160;NullPointerException in LoadResourceAction</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62025" target="_bugz">62025</a>&#160;SDO Data Conversion</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61929" target="_bugz">61929</a>&#160;Inadequate error message from SDO</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61816" target="_bugz">61816</a>&#160;Empty exceptions when trying import model from annoted Java file</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61711" target="_bugz">61711</a>&#160;Make &amp;quot;built in&amp;quot; Ecore types always available in Ecore sample editor</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61640" target="_bugz">61640</a>&#160;ItemPropertyDescriptor should get the editing domain from the item's adapter factory before its root adapter factory.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61503" target="_bugz">61503</a>&#160;Logic for proxy validation is incorrect</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61502" target="_bugz">61502</a>&#160;No busy/progess indicator for long validation operations</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61501" target="_bugz">61501</a>&#160;Validate action not available from the Editor menu</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61500" target="_bugz">61500</a>&#160;Validate action creates markers of incorrect severity</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61495" target="_bugz">61495</a>&#160;NullPointerException if diagnostic data is empty</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61493" target="_bugz">61493</a>&#160;Diagnostician does not correctly validate contents</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61465" target="_bugz">61465</a>&#160;Handle feature name collisions with root implements interface operations</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61302" target="_bugz">61302</a>&#160;Support ESequence.add(String text) and (int index, String text)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60854" target="_bugz">60854</a>&#160;BIDI: Hebrew text is corrupted in the GenModel name.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>&#160;Provide better default substitution group/abstract element support and provide ecore:featureMap and ecore:mixed for more flexible control</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58244" target="_bugz">58244</a>&#160;DBCS: The &amp;lt;NLlibrary&amp;gt;.library model project can not be create in Runtime-workbench.</li></ul></li><li class="outerli">2.0.0&#160;I200405060858 (6 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>&#160;Add the first version of a constraint validation framework</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60731" target="_bugz">60731</a>&#160;Removing handle from empty BasicEMap throws /zero exception</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60603" target="_bugz">60603</a>&#160;References property descriptor missing for EAnnotations</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60602" target="_bugz">60602</a>&#160;Initialization of generated packages doesn't set EStructuralFeature::ordered attribute</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>&#160;BasicEMap iterator provides a null value after removing one or more entries</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>&#160;Separate EditingDomain per Resource</li></ul></li><li class="outerli">2.0.0&#160;I200404291310 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>&#160;BasicEMap iterator provides a null value after removing one or more entries</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>&#160;Separate EditingDomain per Resource</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>&#160;createFromString doesn't trigger an error on unknown Enum values</li></ul></li><li class="outerli">2.0.0&#160;I200404281648 (17 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60151" target="_bugz">60151</a>&#160;instances; an editor is also provided in org.eclipse.emf.mapping.ecore2ecore.editor.org.eclipse.emf.mapping.ecore2ecore, provides a model for mapping between EcoreEcore to Ecore mapping model. A new plug-in,</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59688" target="_bugz">59688</a>&#160;ECoreutil.remove(object, feature, value) should do unset</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59637" target="_bugz">59637</a>&#160;An element of type anyURI mapped to an EReference is improperly handled</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59582" target="_bugz">59582</a>&#160;DBCS: Garbage code be showed  of  library child's name  in runtime workbench.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59536" target="_bugz">59536</a>&#160;XMLSaveImpl.saveHRefMany resolves references</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59465" target="_bugz">59465</a>&#160;ActionBarContributor template problems when generating without creation commands</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>&#160;createFromString does'n trigger an error on unknown Enum values</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=59240" target="_bugz">59240</a>&#160;BasicCommandStack.flush() method doesn't reset mostRecentCommand</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58472" target="_bugz">58472</a>&#160;NPE reading annotated Java class</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58208" target="_bugz">58208</a>&#160;Problem in FeatureChangeImpl.applyAndReverse() method</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58132" target="_bugz">58132</a>&#160;DBCS: generated extra text field on UTF-8 template with BOM</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57654" target="_bugz">57654</a>&#160;implement caching mechanism in URI to reduce repetative String parse costs</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57653" target="_bugz">57653</a>&#160;Don't revalidate new URIs created from existing validated URIs.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57474" target="_bugz">57474</a>&#160;Specifying an Exception in method causes a problem</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=51917" target="_bugz">51917</a>&#160;Add command line option(s) to control generator parameters</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47432" target="_bugz">47432</a>&#160;emf.edit support for referencing a different resource</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=40505" target="_bugz">40505</a>&#160;org.eclipse.emf.ecore.xmi throws exception for xmi:Extension and elements from other namespaces</li></ul></li><li class="outerli">2.0.0&#160;I200404080727 (17 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57707" target="_bugz">57707</a>&#160;DBCS:Import *.xsd xml schema file failed</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57669" target="_bugz">57669</a>&#160;Simplify and improve default factory registration</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57616" target="_bugz">57616</a>&#160;No way to set ItemPropertyDescriptor.filterFlags</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57444" target="_bugz">57444</a>&#160;Null pointer exception saving DataGraph will null root object</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57315" target="_bugz">57315</a>&#160;Add Diagnostic support, which will be used in the validation framework</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57038" target="_bugz">57038</a>&#160;NullPointerException when inserting an attribute into a SDO</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56919" target="_bugz">56919</a>&#160;GenClassImpl.getInterfaceExtends() produces duplicates for rootExtendsInterface other than EObject</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>&#160;Provide general support for feature map entries in EMF.Edit.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56647" target="_bugz">56647</a>&#160;XMLHandler/XMIHandlers support for proper xmlns scoping</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56190" target="_bugz">56190</a>&#160;CopyCommand on objects that reference themselves</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56137" target="_bugz">56137</a>&#160;Parsing invalid boolean value should throw an exception</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55829" target="_bugz">55829</a>&#160;Problems with new Data Types</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55577" target="_bugz">55577</a>&#160;Casting DataObject to AnyType object throws ClassCastException</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54112" target="_bugz">54112</a>&#160;A new option for XMLLoadImpl not to load external DTD in ecore.xmi</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53806" target="_bugz">53806</a>&#160;Perf: Parser pool needed to greatly improve performance</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53453" target="_bugz">53453</a>&#160;Feature request - write out xml DOCTYPE declaration</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=41704" target="_bugz">41704</a>&#160;Value automatically selected in combo box</li></ul></li><li class="outerli">2.0.0&#160;I200403250631 (17 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55955" target="_bugz">55955</a>&#160;Dirty Conflict in Generated Editor</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55587" target="_bugz">55587</a>&#160;Serialize DataGraph as spelled out in the SDO spec</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55463" target="_bugz">55463</a>&#160;Performance improvements can help speed up SDO data accessors</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55462" target="_bugz">55462</a>&#160;EDataGraphImpl needs to implement writeReplace for when it is serialized directly</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55379" target="_bugz">55379</a>&#160;Ant targets dialog rendering error</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55276" target="_bugz">55276</a>&#160;Provide support for blocking properties from being merged in</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55263" target="_bugz">55263</a>&#160;ClassCastException during init() of user-defined Registry class</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=55152" target="_bugz">55152</a>&#160;java name problems</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54706" target="_bugz">54706</a>&#160;EMF Editor Crashes</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54702" target="_bugz">54702</a>&#160;Provide a way to block unused imports from being merged in</li>
<li><div class="fr"><img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54367" target="_bugz">54367</a>&#160;NPE when accessing bogus feature name in SDO</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54271" target="_bugz">54271</a>&#160;JavaEcoreBuilder should ignore interface in @extends</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>&#160;Change EMF templates to be able to use JETNature for build</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>&#160;Update of not unsettable to unsettable in rose not copied to ecore</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>&#160;Use new code formatter constants in GenModelEditor.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="EMF"/>&#160;<img src="../images/icon-sdo.gif" alt="SDO"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>&#160;Handle CTabFolder changes for new UI look</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47434" target="_bugz">47434</a>&#160;refresh capability for model editors</li></ul></li><li class="outerli">2.0.0&#160;I200403081633 (5 Bugs)<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>&#160;Update of not unsettable to unsettable in rose not copied.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>&#160;Use new code formatter constants in GenModelEditor.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>&#160;Handle CTabFolder changes for new UI look.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53772" target="_bugz">53772</a>&#160;ListChange should handle index == -1.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53180" target="_bugz">53180</a>&#160;Problem with name collision in XML-schema generated model.</li></ul></li><li class="outerli">2.0.0&#160;I200402251234SL (7 Bugs)
There are bug fixes and improvements included with this build, some of which are described below.
Where the description applies to a bug reported through Bugzilla, the Bugzilla number is included after the description.
<ul>
<li>
EMF Change Model. A new plugin, org.eclipse.emf.ecore.change, provides a model for representing changes (i.e., deltas) to an arbitrary collection of EMF objects.
The change model can apply its change (and optionally reverse the delta so that the change can later be undone). A change recorder (adapter),
which builds a change model for a set of monitored objects, is also provided. This model is used by the implementation of SDO, see below.
</li>
<li>
<a href="ftp://www6.software.ibm.com/software/developer/library/j-commonj-sdowmt/Commonj-SDO-Specification-v1.0.doc">SDO (Service Data Objects)</a>
reference implementation. SDO is a proposed standard (<a href="http://www.jcp.org/en/jsr/detail?id=235">JSR 235</a>) that
provides a uniform access and manipulation interface for data from heterogeneous data sources, including relational databases, XML data sources, Web services,
and enterprise information systems. The SDO interfaces are contained in plugin org.eclipse.emf.commonj.sdo and implemented, using EMF,
in plugin org.eclipse.emf.ecore.sdo.
</li>
<li>
Changed XMLResource to support producing and using IDs that are universally unique. The method EcoreUtil.generateUUID() is provided
and XMLResource.useUUIDs() and XMLResource.useIDAttributes() can be overridden to enable the capability. There is no support for lookup based on UUID;
this is simply using the existing ID support but is ensuring that the IDs are universally unique.
</li>
<li>
Special cased xsi:schemaLocation to omit #/ from the end of reference. This lets clients write out schema locations that can be used directly either by EMF or by Xerces.
</li>
<li>
Fixed DelegatingFeatureMap/BasicFeatureMap.isMany to properly return value from affiliated feature.
</li>
<li>
Support elements of type ID and appinfo in XSD2Ecore.
For appinfo, the source attribute in the appinfo becomes the source attribute of the annotation.
</li>
<li>
Fixed EcoreUtil.Copier to ensure that an unsettable reference that is set to null is copied.
</li>
<li>
Ensures that a wildcard-based feature delegating to a feature map will be properly treated as a many feature.
</li>
<li>
Added eStore() and eSetStore() methods to EStoreEObjectImpl.
</li>
<li>
Refactored EFactoryImpl.create(EClass) for easier reuse. The implementation of instance creation has been moved to a separate method, basicCreate(),
making it easier to create something other than EObjectImpl.
</li>
</ul>
<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=52312" target="_bugz">52312</a>&#160;Changed EMF editors (.ecore, .genmodel, etc.) and Editor.javajet template to accommodate new UI in Eclipse 3.0 M7.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=52174" target="_bugz">52174</a>&#160;Fixed bug in ReplaceCommand constructor. Wrong object was being used for the replacement.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=51204" target="_bugz">51204</a>&#160;Fixed empty StringSegment.Element bug that caused NPE when saving an XMLResource.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=50782" target="_bugz">50782</a>&#160;Fixed AdapterFactoryLabelProvider and AdapterFactoryContentProvider setAdapterFactory() methods which were not clearing the listener.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=50176" target="_bugz">50176</a>&#160;Changed Rose importer to omit derived attributes with stereotype &amp;lt;&amp;lt;reference&amp;gt;&amp;gt;.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=49269" target="_bugz">49269</a>&#160;Changed CopyCommand to properly preserve order of copied bi-directional references.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=43957" target="_bugz">43957</a>&#160;Removed recursive build from JET, which caused NPEs in GlobalBuildAction, BuildManager.</li></ul></li><li class="outerli">2.0.0&#160;I200401271738SL</li><li class="outerli">2.0.0&#160;I200312190637VL (2 Bugs)
There are bug fixes and improvements included with this build, some of which are described below.
Where the description applies to a bug reported through Bugzilla, the Bugzilla number is included after the description.
<ul>
<li>
Added a command-line utility, XSD2GenModel (analogous to Rose2GenModel), for importing models from XML Schema.
</li>
<li>
Renamed some of the new GenModel attributes (defaultRootExtendsInterface-&gt;rootExtendsInterface,
defaultRootExtendsClass-&gt;rootExtendsClass, defaultRootImplementsInterface-&gt;rootImplementsInterface,
suppressECollections-&gt;suppressEMFTypes), and added more informative, non-default, descriptions to property
descriptors for all the new 2.0 GenModel attributes.
</li>
<li>
Fixed problem in JMerge where the leading brace of a method body was not being handled correctly.
</li>
<li>
Mangle the feature names of an XSD-based model's DocumentRoot class
if they are invalid Java identifiers.
</li>
<li>
An XSD-based model's generated resource factory now sets the OPTION_USE_ENCODED_ATTRIBUTE_STYLE option to true.
</li>
</ul>
<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=48838" target="_bugz">48838</a>&#160;Problem occurred when importing a namespace where the only reference to that namespace was in an ecore:reference.Handle imports resolving during XSD model import.</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=48721" target="_bugz">48721</a>&#160;Register the package instance against the null target namespace in an XSD model's generated resource factory.</li></ul></li><li class="outerli">2.0.0&#160;I200312101532XL (13 Bugs)
Initial EMF 2.0 driver. Eclipse 3.0 (M5) based
Eclipse M5 includes breaking API changes which will require regeneration or equivalent hand modification of generated EMF editors.
Since JDK 1.4 dictates the JAXP default implementation,
all dependencies on the Xerces plugin have now been removed from the EMF (and XSD) plugins.
Use -D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a> to choose a JAXP implementation.
E.g., this command will run Eclipse with the implementation used historically:
<pre>eclipse.exe -vmargs -Djava.endorsed.dirs=plugins/org.apache.xerces_4.0.13</pre>
<b>Migration from 1.1</b>
<br/>
Code regeneration of 1.1 projects is required. There are some breaking changes in this version, specifically in the handling of XML Schema based models. Details are provided below.
<b>Improved XML Schema Support</b>
<br/>
The support for XML Schema has been significantly enhanced in EMF 2.0. Much more of the complexity of XML Schema is now supported,
including mixed and open content. In addition, special Ecore annotations are now supported that allow one to specify the
Ecore model properties that XML Schema cannot otherwise represent. The most significant changes are as follows:
<ul>
<li>
Added interface FeatureMap to represent an arbitrary feature/value pairs which are used to represent mixed or open content (wildcards).
The XSDEcoreBuilder will produce features of this type for complex types with mixed content, for element and attribute wildcards,
and for complex (repeating) model groups. The eGet(), eSet(), etc., methods can be called directly for open content features, which will
then delegate to the appropriate feature map.
</li>
<li>
Added support for document roots. In EMF 1.1, a global element declaration was mapped to an EClass. In 2.0, every namespace will have a single special
EClass, by default named DocumentRoot, which contains a feature for every global element or attribute declaration in the namespace. These represent open
content features which may be used in feature maps corresponding to wildcards. An instance document based on an XML Schema will now
contain a single instance of the document root, exactly one feature of which will be set to contain the actual root element.
</li>
<li>
Two new packages, XMLTypePackage and XMLNamespacePackage, have been added to the ecore plugin. XSDEcoreBuilder by default maps all XSD built in data types
to a corresponding EDataType in the XMLTypePackage. It maps "xml" namespace components to a corresponding XMLNamespacePackage model element
in the XMLNamespace package.
</li>
<li>
A text element from a complex type with mixed content is represented in a feature map by an entry whose feature is one of the attributes
from the XMLTypePackage's DocumentRoot class (i.e., text, CDATA, or comment), and whose value is the text (String). Note that comments
and CDATA are only created if you specify the XMLResource.OPTION_USE_LEXICAL_HANDLER load option. A DocumentRoot also has mixed content
and therefore can capture the comments at the beginning of a document.
</li>
<li>
Added EObject.eContainingFeature(), which in the simple case returns the same as eContainmentFeature(). However, in the case of open content,
containmentFeature() will return one of the features in a FeatureMap (a document root of some package) while eContainingFeature() will return
the feature for the feature map itself.
</li>
<li>
A new FeatureMapUtil class holds various static utility methods and implementation classes.
</li>
<li>
A new interface ExtendedMetaData (and default implementation class BasicExtendedMetaData) encapsulates all the meta data in
an Ecore model and any XSD2Ecore EAnnotations it may have. The default XMLResource now uses this interface
to access the data it needs to customize a schema-based model's serialization/deserialization, instead of using the XMLMap/XMLInfo mechanism.
It is enabled using a new save/load option: XMLResource.OPTION_EXTENDED_META_DATA.
</li>
<li class="outerli">
A set of Ecore namespace (http://www.eclipse.org/emf/2002/Ecore) annotation attributes are now supported in an XSD definition of an Ecore model:
<ul>
<li>
<b>ecore:instanceClass</b> may appear in a simple type to specify the Ecore instanceClassName of the corresponding EDataType.
</li>
<li>
<b>ecore:name</b> is support on any named Component to override the name of the corresponding ENamedElement.
</li>
<li>
<b>ecore:documentRoot</b> can be used on a schema component to specify the name of the document root EClass (which is "DocumentRoot" by default).
</li>
<li>
<b>ecore:package</b> can be used on a schema component to specify the fully qualified Java package name.
</li>
<li>
<b>ecore:nsPrefix</b> on a schema component specifies the nsPrefix attribute the corresponding EPackage.
</li>
<li>
<b>ecore:reference</b> can be specified on either an attribute or element declaration to specify the target of the corresponding EReference. The value
must be a QName that resolves to a complex type within the schema.
</li>
</ul>
</li>
<li>
In EMF 1.x, anyURI, IDREF, and IDREFS mapped to a reference to EObject. Now, instead, by default they map to the corresponding EDataType
in XMLTypePackage instead. This can be tailored using ecore:reference. This is illustrated by the library.xsd example which has been changed
to use ecore:reference annotation for the books and author references.
</li>
<li>
Preliminary support for feature maps has been added to ItemProviderAdapter. This will be changed in the near future with a more general
wrapping mechanism, that will support any feature as a child.
</li>
<li>
Added int UNSPECIFIED_MULTIPLICITY = -2 to ETypedElement. This is used to specify the upper bound of any feature in a document root.
</li>
<li>
Support easier tailoring for handling of xsi:schemaLocation. These changes are to handle more of the
testsuite cases at http://www.xml.com/lpt/a/2003/09/03/binding.html
</li>
</ul>
<b>OMG MOF 2 Support</b>
<br/>
Several changes have been made in EMF 2.0 to align Ecore better with the EMOF (Essential MOF) subset of the MOF 2 Specification.
The following changes are related to this feature:
<ul>
<li class="outerli">
Ecore model changes
<ul>
<li>
Moved the <b>unique</b>, <b>lowerBound</b>, <b>upperBound</b>, <b>many</b>, and <b>required</b> attributes from EStructuralFeature to ETypedElement.
</li>
<li>
Added new <b>ordered</b> attribute to ETypedElement.
</li>
<li>
Added new <b>derived</b> attribute to EStructuralFeature.
</li>
<li>
Added new <b>eStructuralFeatures</b> reference to EClass. This change involves replacing the two black diamond containment references,
<b>eAttributes</b> and <b>eReferences</b>, with a single containment reference <b>eStructuralFeatures</b>. <b>eAttributes</b> and <b>eReferences</b> are now
readonly derived non-containment references; although the add() and addUnique() methods are still supported for them,
so that the parser can read old files. This method will be removed eventually; a warning message is printed to stderr when add() is called.
The Ecore XMI Resource will always serialize Ecore models using the new reference.
</li>
</ul>
</li>
<li class="outerli">
EMOF Resource
<ul>
<li>
An EMOF Resource is now provided and can be used to read or write a serialized Ecore/EMOF model. The EMOF Resource is registered for the <b>.emof</b> URI suffix.
</li>
<li>
The Sample Ecore Model Editor can now edit <b>.ecore</b> or <b>.emof</b> files and supports <b>Save As</b> to convert between Ecore and EMOF serializations of a model.
</li>
<li>
The EMF Model Wizard now also supports import from either <b>.ecore</b> or <b>.emof</b> files.
</li>
<li>
Ecore features not included in EMOF are nested in xmi:Extension elements with extender equal to
the Ecore namespace (http://www.eclipse.org/emf/2002/Ecore).
</li>
</ul>
</li>
</ul>
<b>Model Import Enhancements</b>
<ul>
<li>
XSD diagnostics are displayed in EMF Model Wizard if errors are encountered while loading a model from XML Schema.
</li>
<li>
The import from XML Schema now supports schemas embedded within a WSDL (<b>.wsdl</b>) file.
</li>
<li>
Import from XML Schema now supports specifying/importing multiple URIs at once.
</li>
<li>
The EMF Model Wizard now provides <b>Select All</b> and <b>Deselect All</b> buttons for selecting packages to import.
</li>
<li>
Support for specifying XML Serialization eAnnotations/ExtendedMetaData in Rose.
</li>
<li>
Support for specifying arbitrary Ecore eAnnotations in Rose.
</li>
<li>
Rose comments and XML Schema documentation annotations are now converted to documentation eAnnotations in Ecore,
and subsequently emitted into the generated JavaDoc.
</li>
<li>
Support for operation method bodies (EOperation eAnnotations, see below) in the Semantic pane for a Rose operation.
</li>
<li>
Improved RoseEcoreBuilder handling of EObject-typed attributes in a Rose model. Previously if you had an attribute of type EObject
but the Ecore package was not available, it produced an EAttribute with an EClass as its type, resulting in class cast exceptions.
</li>
<li>
Fixed JavaEcoreBuilder to handle closed/missing projects. Previously exceptions were thrown and quiet failure resulted.
</li>
<li>
JavaEcoreBuilder now computes usage closure. This fixes a problem with missing used GenPackages. The problem stems from missing
indirect dependencies and is fixed by computing the closure when a new package dependency is added. Packages used by the
package being used also need to be used.
</li>
</ul>
<b>New Generator options and function</b>
<br/>
This new function is preliminary and still subject to change. New features include:
<ul>
<li>
You can now specify in the GenModel a different root base interface and impl class, instead of EObject and EObjectImpl.
</li>
<li>
You can suppress EMF ("E") APIs in the generated interfaces (i.e., generate List instead of EList, Map instead of EMap, etc.).
</li>
<li>
Generator now emits throws clause for EOperations that declare eExceptions.
</li>
<li>
eAnnotations can now be set on an EOperation to specify the method body to generate (instead of default "throw new UnsupportedOperationException();").
</li>
<li>
eAnnotations can now be set to specify documentation to be emitted into the generated JavaDoc.
</li>
</ul>
<b>Miscellaneous Bug fixes and Improvements</b>
<ul>
<li>
The bulk of the function in EObjectImpl and NotifierImpl has been moved to base classes BasicEObjectImpl and BasicNotifierImpl, which declare
no storage. EObjectImpl and NotifierImpl are simple subclasses that implement the default current behavior. Clients that have their own implementations
of EObject/InternalEObject are encouraged to extend from these Basic implementations so that future method additions won't break them.
</li>
<li>
Added interface InternalEObject.EStore. A "store" can be provided to an InternalEObject, in which case the implementation of dynamic features
will be delegated to the store, instead of the default dynamic (EPropertiesHolder) implementation.
</li>
<li>
Added wasSet() method to Notification for determining the old isSet state.
</li>
<li>
EcoreUtil.Copier refactored to support easier specialization in subclasses.
</li>
<li>
Changed EAnnotationItemProvider to include contents as children for EAnnotation.
</li>
<li>
Added the option XMLResource.OPTION_FORMATTED. When set to Boolean.FALSE, this will cause linebreak and indentation to be omitted.
The default is Boolean.TRUE, so it must be explicitly set to Boolean.FALSE to have an effect.
</li>
<li>
Generated editors no longer reload model for resource marker changes.
</li>
<li>
Improved error handling in EMFPlugin. Will now throw MissingResourceException instead of NullPointerException when properties are missing.
</li>
<li>
Generated editors now flush the command stack when discarding changes (unloading the resource).
</li>
<li>
Fixed LocalTransfer.nativeToJava to handle bad data. It now catches NumberFormatException and returns null in this case.
</li>
<li>
XMLResource's save (XMLSaveImpl) fixed to check for null namespace when saving prefixes.
</li>
<li>
Added new method XMLHelper.getPrefix(EPackage, boolean) that is shared by getQName(EPackage, String, boolean) and
getPrefix(EPackage), to ensure that the package is added to the helper's packages list when getPrefix is called directly first.
</li>
<li>
XMLSaveImpl changed update of prefix to namespace map to avoid getting notification of an entry being set to the value it already has.
</li>
<li>
XMLHandler support to resolve forward references early. If an Ecore model and an instance of that model need to be processed when they are both
in the same document, it's necessary to be able to resolve all the forward references in the Ecore model before it can be used to instantiate instances.
Hence it should be possible to do some of the processing currently in endDocument early. The new method handleForwardReferences() can be called to do this.
It delegates to a handleForwardReferences() overload which takes an isEndDocument argument, so the code for processing during endDocument() can now be
shared for use earlier.
</li>
<li>
Fixed improper handling of primitives in EcoreFactoryImpl.createEJavaClassFromString.
</li>
<li>
Support EMap.putAll(EMap). By supporting EMap.putAll() from another EMap we can preserve the overall order.
</li>
<li>
Fixed dynamic setting for container to check feature. The getter for a container dynamic setting was not checking that the feature is the correct one
and returned the container regardless of whether it was for the feature or not.
</li>
<li>
Fixed generator to not set ECLIPSE_SWT classpath variable to incorrect value when org.eclipse.swt and its platform-specific fragment have different version numbers.
</li>
<li>
Tuned method BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature). Simple dynamic eGet() will be twice as fast now.
</li>
</ul>
<ul><li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=48447" target="_bugz">48447</a>&#160;Resource creation should only be successful if file was opened</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=48417" target="_bugz">48417</a>&#160;JETEmitter generated class not found by URLClassLoader</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47999" target="_bugz">47999</a>&#160;EAnnotation written down in context of Rose model</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47718" target="_bugz">47718</a>&#160;notifyChanged method in MappingRootImpl never gets called</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=47497" target="_bugz">47497</a>&#160;Attribute name: 'class'</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=46803" target="_bugz">46803</a>&#160;Improved customizability of proxy resolution</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=46230" target="_bugz">46230</a>&#160;Support XML Schema Instance Document Persistence from Rose model derived ECore model</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=45660" target="_bugz">45660</a>&#160;Incorrect classpath setting for generated editor code on Linux/gtk</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=45606" target="_bugz">45606</a>&#160;Cannot "reload" emf model</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=45605" target="_bugz">45605</a>&#160;Cannot generate genmodel for plugin project</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=42502" target="_bugz">42502</a>&#160;Rose description text not emitted into Java source (JavaDoc)</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=40613" target="_bugz">40613</a>&#160;Add JET Nature should be a wizard or at least confirm choice; use File-&gt;New-&gt;Other...-&gt;Java Emitter Templates-&gt;Convert Projects to JET Projects</li>
<li><div class="fr"><img src="../images/icon-emf.gif" alt="emf"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=38069" target="_bugz">38069</a>&#160;GenModel meta-model is hard-coded in JET</li></ul></li></ul></div><div class="homeitem3col"><h3>XSD Release Notes<a name="xsd">&nbsp;</a></h3><ul><li class="release">2.0.5 Release
						</li><li class="outerli">2.0.5 Release</li><li class="outerli">2.0.5RC1<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=118276&amp;Bugzilla=118276"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=118276" target="_bugz">118276</a>&#160;[Duplicate] xmlns="" is not considered correctly when loading schema</li></ul></li><li class="release">2.0.4 Release
						</li><li class="outerli">2.0.4 Release</li><li class="outerli">2.0.4&#160;M200509081011<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>&#160;[Dupe] Fix JDK5.0 compiler errors</li></ul></li><li class="release">2.0.3 Release
						&#160;(4 Bugs)</li><li class="outerli">2.0.3 Release (4 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>&#160;notice.html missing from XSD zips</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>&#160;notice.html missing from EMF zips</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>&#160;Migrate license from CPL to EPL [2.0.3]</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>&#160;Migrate license from CPL to EPL [2.0.3]</li></ul></li><li class="outerli">2.0.3RC2a</li><li class="outerli">2.0.3RC2</li><li class="outerli">2.0.3RC1</li><li class="release">2.0.2 Release
						</li><li class="outerli">2.0.2 Release</li><li class="outerli">2.0.2RC3</li><li class="outerli">2.0.2&#160;M200503081329</li><li class="outerli">2.0.2RC2<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>&#160;[DUPE] xsd doc : toc.xml has invalid xml?</li></ul></li><li class="outerli">2.0.2&#160;M200502171209</li><li class="outerli">2.0.2&#160;M200502100700</li><li class="outerli">2.0.2&#160;M200502030700</li><li class="outerli">2.0.2&#160;M200501270700</li><li class="outerli">2.0.2&#160;M200501191212</li><li class="release">2.0.1 Release
						&#160;(15 Bugs)</li><li class="outerli">2.0.1 Release<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>&#160;Support for backup/secondary/multiple Update URL(s)</li></ul></li><li class="outerli">2.0.1RC2</li><li class="outerli">2.0.1RC1<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="http://www.eclipse.org/emf/searchcvs.php?q=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Deltas"/></a>&#160;<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>&#160;Support for backup/secondary/multiple Update URL(s)</li></ul></li><li class="outerli">2.0.1&#160;M200409011021 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=73024" target="_bugz">73024</a>&#160;XSDSchema.validate() block</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72852" target="_bugz">72852</a>&#160;Using a redefined group in the original schema</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>&#160;[osgi] headers incorrectly cached when a bundle is installed from the update manager</li></ul></li><li class="outerli">2.0.1&#160;M200408261626</li><li class="outerli">2.0.1&#160;M200408260844 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72532" target="_bugz">72532</a>&#160;Permission  access denied</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72384" target="_bugz">72384</a>&#160;DOMException when calling XSDSchema.createElement()</li></ul></li><li class="outerli">2.0.1&#160;M200408190924 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=72018" target="_bugz">72018</a>&#160;XSD Serialization has no indents</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71882" target="_bugz">71882</a>&#160;Including elements from a schema with no namespace</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>&#160;Support frozen Ecore instances for improved performance</li></ul></li><li class="outerli">2.0.1&#160;M200408120834<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>&#160;Support frozen Ecore instances for improved performance</li></ul></li><li class="outerli">2.0.1&#160;M200408040957 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=71116" target="_bugz">71116</a>&#160;Generation from Schema: NullPointerException in XSDECoreBuilder</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>&#160;wrong recognize of length of restricted xsd:hexBinary</li></ul></li><li class="outerli">2.0.1&#160;M200407280859<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>&#160;wrong recognize of length of restricted xsd:hexBinary</li></ul></li><li class="outerli">2.0.1&#160;M200407211027</li><li class="outerli">2.0.1&#160;M200407150937<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=69081" target="_bugz">69081</a>&#160;Resolution mechanism for schemas does not use the resolved schema</li></ul></li><li class="release">2.0.0 Release
						&#160;(35 Bugs)</li><li class="outerli">2.0.0 Release</li><li class="outerli">2.0.0&#160;I200406250129</li><li class="outerli">2.0.0&#160;I200406211000<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>&#160;BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature) gives bad result for open content features</li></ul></li><li class="outerli">2.0.0&#160;I200406171028<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>&#160;Fix EMF editors to avoid new null selection assertion in SelectionChangedEvent in RC2</li></ul></li><li class="outerli">2.0.0&#160;I200406100948 (8 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66327" target="_bugz">66327</a>&#160;Use equalsIgnoreCase to match the public ID of the XMLSchema.dtd</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66232" target="_bugz">66232</a>&#160;Produce unique getAliasName for anonymous union members</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>&#160;Avoid the use of CCombo in the generated wizards.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>&#160;Support ecore:ignore for facets, XSDAnnotation, &amp;lt;documentation&amp;gt;, and &amp;lt;appinfo&amp;gt;.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>&#160;Complete the support for validating according to XML Schema simple facets</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>&#160;Add activities to EMF and XSD</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65703" target="_bugz">65703</a>&#160;'Save' action does'nt work in the XSD Editor</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=65672" target="_bugz">65672</a>&#160;maxLength not permitted in string</li></ul></li><li class="outerli">2.0.0&#160;I200406030436 (4 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=64864" target="_bugz">64864</a>&#160;overview tree stops responding</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=63916" target="_bugz">63916</a>&#160;NPE during Schema validation</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>&#160;THAI: XSD Editor have problem with Thai characters.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>&#160;Enhancement to enable dynamic and generated EPackage usage across JVMs</li></ul></li><li class="outerli">2.0.0&#160;I200405200923 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>&#160;THAI: XSD Editor have problem with Thai characters.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>&#160;Support generator control over runtime compatibility and Rich Client Platform</li></ul></li><li class="outerli">2.0.0&#160;I200405131028 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61736" target="_bugz">61736</a>&#160;Support an ecore:opposite annotation for XSDEcoreBuilder</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>&#160;Provide better default substitution group/abstract element support and provide ecore:featureMap and ecore:mixed for more flexible control</li></ul></li><li class="outerli">2.0.0&#160;I200405060858 (3 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>&#160;Add the first version of a constraint validation framework</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>&#160;Annotation appinfo corrupts element declaration type</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>&#160;Redefinition of type does not affect indirectly included derived type</li></ul></li><li class="outerli">2.0.0&#160;I200404291310 (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>&#160;Annotation appinfo corrupts element declaration type</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>&#160;Redefinition of type does not affect indirectly included derived type</li></ul></li><li class="outerli">2.0.0&#160;I200404281648<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=57686" target="_bugz">57686</a>&#160;NullPointerException activating Sample XML Schema Editor from M8</li></ul></li><li class="outerli">2.0.0&#160;I200404080727 (4 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>&#160;Provide general support for feature map entries in EMF.Edit.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56812" target="_bugz">56812</a>&#160;JS: xsd-&amp;gt;ecore converter does not process nillable properly</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56328" target="_bugz">56328</a>&#160;Ensure that includes/redefines of a cloned included/redefined schema are computed</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=56269" target="_bugz">56269</a>&#160;XSDSchema.validate() does not return and leads to an OutOfMemory Exception</li></ul></li><li class="outerli">2.0.0&#160;I200403250631 (5 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54289" target="_bugz">54289</a>&#160;Bad performance for validating XSD with lots of &amp;lt;all&amp;gt;</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54203" target="_bugz">54203</a>&#160;Types and elements are not visible when an include is added</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>&#160;Change EMF templates to be able to use JETNature for build</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53776" target="_bugz">53776</a>&#160;Cannot generate XSD for model</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=53421" target="_bugz">53421</a>&#160;Problems not removed after fixing</li></ul></li><li class="outerli">2.0.0&#160;I200403081633</li><li class="outerli">2.0.0&#160;I200402251234SL (2 Bugs)<ul><li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=50222" target="_bugz">50222</a>&#160;The getPropertyDescriptors() method of some of the XSD facet item providers was using the wrong "Value" property.</li>
<li><div class="fr"><img src="../images/icon-xsd.gif" alt="xsd"/></div><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=49692" target="_bugz">49692</a>&#160;Changed XSD2GenModel to initialize GenModel.modelName to avoid exception when viewing .genmodel file in the IDE.</li></ul></li><li class="outerli">2.0.0&#160;I200401271738SL</li><li class="outerli">2.0.0&#160;I200312190637VL</li><li class="outerli">2.0.0&#160;I200312101532XL</li></ul></div></div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - EMF Release Notes";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/relnotes.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/emf/includes/toggle.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
