	<html>
	<head>
    <title>EMF, SDO, XSD Release Notes</title>
    <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
    <script type="text/javascript" src="http://www.eclipse.org/emf/includes/detaildiv.js"></script>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
	<style>@import url("release-notes.css");</style>
	</head>
	<body>

	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr valign="top"><td colspan="1" align="left" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" BGCOLOR="#006699" >

		 <tr>
			  <td BGCOLOR="#000000" width="116" height="50"><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
			  <td width="637" height="50" style="background-repeat: repeat-y;" background="http://www.eclipse.org/images/gradient.jpg"></td>
			  <td width="250" height="50"><img src="http://www.eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
		 </tr>

		</table></td>
	  </tr>
	</table>
	
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top">
		<td align="left" width="115" bgcolor="#6699CC">

			<?php include_once '../includes/nav.xml'; ?>

		</td>

		<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="100%">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop">
		Release Notes
		</font><br/>
        <font class="indexsub">Eclipse Modeling Framework</font>

      </td>
      <td width="40%">
        <img src="http://www.eclipse.org/emf/images/c.gif" align="right"/>
      </td>

    </tr>
  </tbody>            
</table>

<table border="0" cellpadding="2" width="100%" >
<tr>

<td align="LEFT" valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF">
	Release Notes
</font></font></b><a name="top">&#160;</a></td>
</tr>
</table>

<!-- content begins -->
<table cellspacing="0" cellpadding="0" border="0" width="99%">
    <tr valign="top">
      <td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"></td>
      <td align="left" width="99%">
        <table width="60%">
          <tr>
            <td>
              <hr size="1" width="100%"><span class="log-text">To filter, enter a search term in a field and hit <b>Go!</b>
            Multiple terms are treated as an <b>OR</b> search. You can also use these predefined filters: <br>
   <img src="../images/icon-emf.gif" border="0" alt="emf"><a href="http://www.eclipse.org/emf/news/release-notes.php?project=emf">EMF</a> ::
<img src="../images/icon-sdo.gif" border="0" alt="sdo"><a href="http://www.eclipse.org/emf/news/release-notes.php?project=emf">SDO</a> ::
<img src="../images/icon-xsd.gif" border="0" alt="xsd"><a href="http://www.eclipse.org/emf/news/release-notes.php?project=xsd">XSD</a> ::

<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.2">2.2</a> ::
<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.1">2.1</a> ::
<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.0">2.0</a> ::
            <a href="release-notes-1.x.php">1.x</a>
              </span>
              <hr size="1" width="100%">
              <form action="http://www.eclipse.org/emf/news/release-notes.php" method="get" name="mainform">
                <select class="log-text" name="project" size="1">
                  <option value=""> Choose... </option>
                  <option value="emf">EMF &amp; SDO Release Notes</option>
                  <option value="xsd">XSD Release Notes</option>
                  <option value=""> - All - </option>
                </select>
            
            <select class="log-text" name="version" size="1">
                  <option value=""> Choose... </option>
                  <option value="2.2.0">2.2.0</option>
                  <option value="2.2">2.2.x</option>
                  <option value="2.1.2">2.1.2</option>
                  <option value="2.1.1">2.1.1</option>
                  <option value="2.1.0">2.1.0</option>
                  <option value="2.1">2.1.x</option>
                  <option value="2.0.5">2.0.5</option>
                  <option value="2.0.4">2.0.4</option>
                  <option value="2.0.3">2.0.3</option>
                  <option value="2.0.2">2.0.2</option>
                  <option value="2.0.1">2.0.1</option>
                  <option value="2.0.0">2.0.0</option>
                  <option value="2.0" selected>2.0.x</option>
                </select>
            
            <input class="black-no-underline" type="submit" name="z" value="Go!">
              </form>
            </td>
          </tr>
          <tr>
            <td>
              <form action="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php" method="get" name="bugform" onSubmit="javascript:document.getElementById('Bugzilla').value = document.getElementById('bug').value" target="_blank">
                <input type="hidden" name="source" value="emf">
                <label for="bug">CVS Delta for Bug ID: </label>
                <input size="7" type="text" name="bug" id="bug">
                <input type="hidden" name="Bugzilla" id="Bugzilla" value="">
                <input type="submit" value="Go!">
              </form>
            </td>
          </tr>
        </table>
        <table border="0" cellspacing="1" cellpadding="3" width="99%">
          <tr class="header">
            <td colspan="1" class="sub-header">
              <a class="sub-header" style="text-decoration:none" href="#emf">EMF &amp; SDO Release Notes</a>
            </td>
            <td colspan="1" class="sub-header">
          Bugs Closed <small>(click below to show bugs for a given release)</small>
            </td>
          </tr>
          <tr id="nameemf.2.0.5.2.0.5" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.5.2.0.5','#C0D8FF')" onMouseOut="rowOut('emf.2.0.5.2.0.5','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.5.2.0.5';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.5 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.5.2.0.5',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none"></a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.5.2.0.5">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.5.2.0.5"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <a href="javascript:servOC('emf.2.0.5.2.0.5',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="nameemf.2.0.4.2.0.4" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.4.2.0.4','#C0D8FF')" onMouseOut="rowOut('emf.2.0.4.2.0.4','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.4.2.0.4';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.4 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.4.2.0.4',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">2 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.4.2.0.4">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.4.2.0.4"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=105533&amp;Bugzilla=105533"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105533" target="_bugz">105533</a>,
                </nobr> 
              <a href="javascript:servOC('emf.2.0.4.2.0.4',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="nameemf.2.0.3.2.0.3" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.3.2.0.3','#C0D8FF')" onMouseOut="rowOut('emf.2.0.3.2.0.3','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.3.2.0.3';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.3 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.3.2.0.3',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">6 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.3.2.0.3">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.3.2.0.3"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=96106&amp;Bugzilla=96106"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96106" target="_bugz">96106</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=91325&amp;Bugzilla=91325"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=91325" target="_bugz">91325</a>,
                </nobr> 
              <a href="javascript:servOC('emf.2.0.3.2.0.3',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="nameemf.2.0.2.2.0.2" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.2.2.0.2','#C0D8FF')" onMouseOut="rowOut('emf.2.0.2.2.0.2','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.2.2.0.2';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.2 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.2.2.0.2',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">11 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.2.2.0.2">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.2.2.0.2"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=87219&amp;Bugzilla=87219"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87219" target="_bugz">87219</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=85555&amp;Bugzilla=85555"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=85555" target="_bugz">85555</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=84182&amp;Bugzilla=84182"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=84182" target="_bugz">84182</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83050&amp;Bugzilla=83050"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83050" target="_bugz">83050</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83049&amp;Bugzilla=83049"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83049" target="_bugz">83049</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83048&amp;Bugzilla=83048"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83048" target="_bugz">83048</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83047&amp;Bugzilla=83047"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83047" target="_bugz">83047</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83046&amp;Bugzilla=83046"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83046" target="_bugz">83046</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83045&amp;Bugzilla=83045"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83045" target="_bugz">83045</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83044&amp;Bugzilla=83044"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83044" target="_bugz">83044</a>,
                </nobr> 
              <a href="javascript:servOC('emf.2.0.2.2.0.2',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="nameemf.2.0.1.2.0.1" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.1.2.0.1','#C0D8FF')" onMouseOut="rowOut('emf.2.0.1.2.0.1','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.1.2.0.1';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.1 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.1.2.0.1',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">53 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.1.2.0.1">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.1.2.0.1"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72875" target="_bugz">72875</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72731" target="_bugz">72731</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72675" target="_bugz">72675</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72645" target="_bugz">72645</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72565" target="_bugz">72565</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72538" target="_bugz">72538</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72428" target="_bugz">72428</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72265" target="_bugz">72265</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72254" target="_bugz">72254</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72204" target="_bugz">72204</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72194" target="_bugz">72194</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72056" target="_bugz">72056</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72014" target="_bugz">72014</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71834" target="_bugz">71834</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71681" target="_bugz">71681</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71599" target="_bugz">71599</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71597" target="_bugz">71597</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71580" target="_bugz">71580</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71565" target="_bugz">71565</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71523" target="_bugz">71523</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71509" target="_bugz">71509</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71487" target="_bugz">71487</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71465" target="_bugz">71465</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71314" target="_bugz">71314</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71305" target="_bugz">71305</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71034" target="_bugz">71034</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70789" target="_bugz">70789</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70583" target="_bugz">70583</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70563" target="_bugz">70563</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70560" target="_bugz">70560</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70559" target="_bugz">70559</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70423" target="_bugz">70423</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70031" target="_bugz">70031</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69680" target="_bugz">69680</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69576" target="_bugz">69576</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69525" target="_bugz">69525</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69270" target="_bugz">69270</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69029" target="_bugz">69029</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68564" target="_bugz">68564</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67708" target="_bugz">67708</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>,
                </nobr> 
              <a href="javascript:servOC('emf.2.0.1.2.0.1',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="nameemf.2.0.0.2.0.0" valign="top" class="dark-row" onMouseOver="rowOver('emf.2.0.0.2.0.0','#C0D8FF')" onMouseOut="rowOut('emf.2.0.0.2.0.0','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#emf.2.0.0.2.0.0';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.0 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('emf.2.0.0.2.0.0',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">171 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtremf.2.0.0.2.0.0">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifemf.2.0.0.2.0.0"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68465" target="_bugz">68465</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68310" target="_bugz">68310</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68256" target="_bugz">68256</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68200" target="_bugz">68200</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68198" target="_bugz">68198</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68068" target="_bugz">68068</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67992" target="_bugz">67992</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67863" target="_bugz">67863</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67860" target="_bugz">67860</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67826" target="_bugz">67826</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67783" target="_bugz">67783</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67748" target="_bugz">67748</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67720" target="_bugz">67720</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67635" target="_bugz">67635</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67493" target="_bugz">67493</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67445" target="_bugz">67445</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67162" target="_bugz">67162</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66944" target="_bugz">66944</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66367" target="_bugz">66367</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66361" target="_bugz">66361</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66118" target="_bugz">66118</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66038" target="_bugz">66038</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66037" target="_bugz">66037</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65730" target="_bugz">65730</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65725" target="_bugz">65725</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65700" target="_bugz">65700</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65605" target="_bugz">65605</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65082" target="_bugz">65082</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65064" target="_bugz">65064</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64734" target="_bugz">64734</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64535" target="_bugz">64535</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64374" target="_bugz">64374</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64309" target="_bugz">64309</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64217" target="_bugz">64217</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63821" target="_bugz">63821</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63497" target="_bugz">63497</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63117" target="_bugz">63117</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63079" target="_bugz">63079</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62988" target="_bugz">62988</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62898" target="_bugz">62898</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62471" target="_bugz">62471</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62452" target="_bugz">62452</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62275" target="_bugz">62275</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62181" target="_bugz">62181</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62030" target="_bugz">62030</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62026" target="_bugz">62026</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62025" target="_bugz">62025</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61929" target="_bugz">61929</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61816" target="_bugz">61816</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61711" target="_bugz">61711</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61640" target="_bugz">61640</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61601" target="_bugz">61601</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61595" target="_bugz">61595</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61503" target="_bugz">61503</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61502" target="_bugz">61502</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61501" target="_bugz">61501</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61500" target="_bugz">61500</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61495" target="_bugz">61495</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61493" target="_bugz">61493</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61465" target="_bugz">61465</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61302" target="_bugz">61302</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61210" target="_bugz">61210</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60854" target="_bugz">60854</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60731" target="_bugz">60731</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60603" target="_bugz">60603</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60602" target="_bugz">60602</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60151" target="_bugz">60151</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59688" target="_bugz">59688</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59637" target="_bugz">59637</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59582" target="_bugz">59582</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59536" target="_bugz">59536</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59465" target="_bugz">59465</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59240" target="_bugz">59240</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58472" target="_bugz">58472</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58244" target="_bugz">58244</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58208" target="_bugz">58208</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58132" target="_bugz">58132</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57865" target="_bugz">57865</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57707" target="_bugz">57707</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57669" target="_bugz">57669</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57654" target="_bugz">57654</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57653" target="_bugz">57653</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57616" target="_bugz">57616</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57593" target="_bugz">57593</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57474" target="_bugz">57474</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57444" target="_bugz">57444</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57315" target="_bugz">57315</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57038" target="_bugz">57038</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56919" target="_bugz">56919</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56647" target="_bugz">56647</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56190" target="_bugz">56190</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56137" target="_bugz">56137</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55955" target="_bugz">55955</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55829" target="_bugz">55829</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55587" target="_bugz">55587</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55577" target="_bugz">55577</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55463" target="_bugz">55463</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55462" target="_bugz">55462</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55379" target="_bugz">55379</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55276" target="_bugz">55276</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55263" target="_bugz">55263</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55152" target="_bugz">55152</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54706" target="_bugz">54706</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54702" target="_bugz">54702</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54367" target="_bugz">54367</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54271" target="_bugz">54271</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54112" target="_bugz">54112</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53806" target="_bugz">53806</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53772" target="_bugz">53772</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53453" target="_bugz">53453</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53180" target="_bugz">53180</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52312" target="_bugz">52312</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52174" target="_bugz">52174</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51917" target="_bugz">51917</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51204" target="_bugz">51204</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50782" target="_bugz">50782</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50176" target="_bugz">50176</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49269" target="_bugz">49269</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48838" target="_bugz">48838</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48721" target="_bugz">48721</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48447" target="_bugz">48447</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48417" target="_bugz">48417</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47999" target="_bugz">47999</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47718" target="_bugz">47718</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47497" target="_bugz">47497</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47434" target="_bugz">47434</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47432" target="_bugz">47432</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47327" target="_bugz">47327</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47201" target="_bugz">47201</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46803" target="_bugz">46803</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46230" target="_bugz">46230</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45660" target="_bugz">45660</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45606" target="_bugz">45606</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45605" target="_bugz">45605</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43957" target="_bugz">43957</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=42502" target="_bugz">42502</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41704" target="_bugz">41704</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40613" target="_bugz">40613</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40505" target="_bugz">40505</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39618" target="_bugz">39618</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38069" target="_bugz">38069</a>,
                </nobr> 
              <a href="javascript:servOC('emf.2.0.0.2.0.0',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="spacer"></td>
          </tr>
          <tr class="header">
            <td colspan="1" class="sub-header">
              <a class="sub-header" style="text-decoration:none" href="#xsd">XSD Release Notes</a>
            </td>
            <td colspan="1" class="sub-header">
          Bugs Closed <small>(click below to show bugs for a given release)</small>
            </td>
          </tr>
          <tr id="namexsd.2.0.5.2.0.5" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.5.2.0.5','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.5.2.0.5','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.5.2.0.5';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.5 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.5.2.0.5',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">1 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.5.2.0.5">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.5.2.0.5"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=118276&amp;Bugzilla=118276"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=118276" target="_bugz">118276</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.5.2.0.5',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="namexsd.2.0.4.2.0.4" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.4.2.0.4','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.4.2.0.4','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.4.2.0.4';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.4 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.4.2.0.4',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">1 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.4.2.0.4">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.4.2.0.4"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.4.2.0.4',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="namexsd.2.0.3.2.0.3" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.3.2.0.3','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.3.2.0.3','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.3.2.0.3';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.3 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.3.2.0.3',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">4 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.3.2.0.3">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.3.2.0.3"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.3.2.0.3',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="namexsd.2.0.2.2.0.2" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.2.2.0.2','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.2.2.0.2','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.2.2.0.2';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.2 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.2.2.0.2',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">1 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.2.2.0.2">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.2.2.0.2"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.2.2.0.2',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="namexsd.2.0.1.2.0.1" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.1.2.0.1','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.1.2.0.1','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.1.2.0.1';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.1 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.1.2.0.1',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">15 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.1.2.0.1">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.1.2.0.1"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73024" target="_bugz">73024</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
                </nobr> 
              <nobr>
                        <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72852" target="_bugz">72852</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72532" target="_bugz">72532</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72384" target="_bugz">72384</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72018" target="_bugz">72018</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71882" target="_bugz">71882</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71116" target="_bugz">71116</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69081" target="_bugz">69081</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.1.2.0.1',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr id="namexsd.2.0.0.2.0.0" valign="top" class="dark-row" onMouseOver="rowOver('xsd.2.0.0.2.0.0','#C0D8FF')" onMouseOut="rowOut('xsd.2.0.0.2.0.0','#EEEEFF')">
            <td class="normal" width="22%" onclick="document.location.href='#xsd.2.0.0.2.0.0';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">
                <b>2.0.0 Release</b>
              </a>
            </td>
            <td class="normal" width="70%" onClick="servOC('xsd.2.0.0.2.0.0',0)" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true">
              <a href="javascript://" style="text-decoration:none">35 bugs</a>
            </td>
          </tr>
          <tr style="display:none" id="ihtrxsd.2.0.0.2.0.0">
            <td bgcolor="#C0D8FF" colspan="2">
              <table cellspacing="0" cellpadding="0" border="0" bgcolor="white" width="100%">
                <tr>
                  <td width="10"></td>
                  <td style="border:0px solid #000000">
                    <div frameborder="0" id="ihifxsd.2.0.0.2.0.0"><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"><br>
                      <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66327" target="_bugz">66327</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66232" target="_bugz">66232</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65703" target="_bugz">65703</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65672" target="_bugz">65672</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64864" target="_bugz">64864</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63916" target="_bugz">63916</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61736" target="_bugz">61736</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57686" target="_bugz">57686</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56812" target="_bugz">56812</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56328" target="_bugz">56328</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56269" target="_bugz">56269</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54289" target="_bugz">54289</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54203" target="_bugz">54203</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53776" target="_bugz">53776</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53421" target="_bugz">53421</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50222" target="_bugz">50222</a>,
                </nobr> 
              <nobr>
                        <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49692" target="_bugz">49692</a>,
                </nobr> 
              <a href="javascript:servOC('xsd.2.0.0.2.0.0',0)" style="text-decoration:none;color:black">&#9632;</a>
                      <br><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"></div>
                  </td>
                  <td width="10"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="spacer"></td>
          </tr>
        </table>
        <p></p>
        <table border="0" cellspacing="1" cellpadding="5" width="99%">
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf">EMF &amp; SDO Release Notes</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.5.2.0.5">2.0.5 Release</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.5.2.0.5">
                <b class="title">
                  <b>2.0.5 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.5.2.0.5RC1">
                <b class="title">
                  <b>2.0.5RC1</b>
                </b>
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.4.2.0.4">2.0.4 Release</a>(2 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.4.2.0.4">
                <b class="title">
                  <b>2.0.4 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.4.M200509081011">
                <b class="title">2.0.4M200509081011</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2005090810111" onMouseOver="rowOver('emfM2005090810111','#C0D8FF')" onMouseOut="rowOut('emfM2005090810111','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[Dupe] Fix JDK5.0 compiler errors</td>
                </tr>
                <tr id="nameemfM2005090810112" onMouseOver="rowOver('emfM2005090810112','#C0D8FF')" onMouseOut="rowOut('emfM2005090810112','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=105533&amp;Bugzilla=105533"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105533" target="_bugz">105533</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[Dupe] ESuperAdapter holds onto references forever == memory leak</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.3.2.0.3">2.0.3 Release</a>(6 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.3.2.0.3">
                <b class="title">
                  <b>2.0.3 Release</b>
                </b>
              </a>(4 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.31" onMouseOver="rowOver('emf2.0.31','#C0D8FF')" onMouseOut="rowOut('emf2.0.31','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">notice.html missing from XSD zips</td>
                </tr>
                <tr id="nameemf2.0.32" onMouseOver="rowOver('emf2.0.32','#C0D8FF')" onMouseOut="rowOut('emf2.0.32','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">notice.html missing from EMF zips</td>
                </tr>
                <tr id="nameemf2.0.33" onMouseOver="rowOver('emf2.0.33','#C0D8FF')" onMouseOut="rowOut('emf2.0.33','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Migrate license from CPL to EPL [2.0.3]</td>
                </tr>
                <tr id="nameemf2.0.34" onMouseOver="rowOver('emf2.0.34','#C0D8FF')" onMouseOut="rowOut('emf2.0.34','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Migrate license from CPL to EPL [2.0.3]</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.3.2.0.3RC2a">
                <b class="title">
                  <b>2.0.3RC2a</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.3.2.0.3RC2">
                <b class="title">
                  <b>2.0.3RC2</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.3RC21" onMouseOver="rowOver('emf2.0.3RC21','#C0D8FF')" onMouseOut="rowOut('emf2.0.3RC21','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=91325&amp;Bugzilla=91325"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=91325" target="_bugz">91325</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Threads &amp; EPackageImpl.getEClassifier()</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.3.2.0.3RC1">
                <b class="title">
                  <b>2.0.3RC1</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.3RC11" onMouseOver="rowOver('emf2.0.3RC11','#C0D8FF')" onMouseOut="rowOut('emf2.0.3RC11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=96106&amp;Bugzilla=96106"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=96106" target="_bugz">96106</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Error getting SDO Object with concurrent mediations</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.2.2.0.2">2.0.2 Release</a>(11 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.2.0.2">
                <b class="title">
                  <b>2.0.2 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.2.0.2RC3">
                <b class="title">
                  <b>2.0.2RC3</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200503081329">
                <b class="title">2.0.2M200503081329</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2005030813291" onMouseOver="rowOver('emfM2005030813291','#C0D8FF')" onMouseOut="rowOut('emfM2005030813291','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=87219&amp;Bugzilla=87219"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=87219" target="_bugz">87219</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] %featureName? %providerName?</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.2.0.2RC2">
                <b class="title">
                  <b>2.0.2RC2</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.2RC21" onMouseOver="rowOver('emf2.0.2RC21','#C0D8FF')" onMouseOut="rowOut('emf2.0.2RC21','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] xsd doc : toc.xml has invalid xml?</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200502171209">
                <b class="title">2.0.2M200502171209</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2005021712091" onMouseOver="rowOver('emfM2005021712091','#C0D8FF')" onMouseOut="rowOut('emfM2005021712091','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=85555&amp;Bugzilla=85555"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=85555" target="_bugz">85555</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] A data type called URI results in generated XyzPackageImpl that doesn't compile in the case of load initialization.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200502100700">
                <b class="title">2.0.2M200502100700</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200502030700">
                <b class="title">2.0.2M200502030700</b>
              </a>(7 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2005020307001" onMouseOver="rowOver('emfM2005020307001','#C0D8FF')" onMouseOut="rowOut('emfM2005020307001','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=84182&amp;Bugzilla=84182"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=84182" target="_bugz">84182</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] ChangeSummary.isDeleted() fails after endLogging/beginLogging</td>
                </tr>
                <tr id="nameemfM2005020307002" onMouseOver="rowOver('emfM2005020307002','#C0D8FF')" onMouseOut="rowOut('emfM2005020307002','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83050&amp;Bugzilla=83050"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83050" target="_bugz">83050</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] ClassCastException when saving a ChangeDescription with multivalue attribute.</td>
                </tr>
                <tr id="nameemfM2005020307003" onMouseOver="rowOver('emfM2005020307003','#C0D8FF')" onMouseOut="rowOut('emfM2005020307003','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83049&amp;Bugzilla=83049"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83049" target="_bugz">83049</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] EObject.eContainmentFeature may return wrong result for containment via an open content feature in a  feature map entry.</td>
                </tr>
                <tr id="nameemfM2005020307004" onMouseOver="rowOver('emfM2005020307004','#C0D8FF')" onMouseOut="rowOut('emfM2005020307004','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83048&amp;Bugzilla=83048"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83048" target="_bugz">83048</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] getContainmentProperty() throws a NullPointerException</td>
                </tr>
                <tr id="nameemfM2005020307005" onMouseOver="rowOver('emfM2005020307005','#C0D8FF')" onMouseOut="rowOut('emfM2005020307005','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83047&amp;Bugzilla=83047"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83047" target="_bugz">83047</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] EDate's createFromString/convertToString isn't thread safe.</td>
                </tr>
                <tr id="nameemfM2005020307006" onMouseOver="rowOver('emfM2005020307006','#C0D8FF')" onMouseOut="rowOut('emfM2005020307006','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83046&amp;Bugzilla=83046"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83046" target="_bugz">83046</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] Inconsistent data access on List values</td>
                </tr>
                <tr id="nameemfM2005020307007" onMouseOver="rowOver('emfM2005020307007','#C0D8FF')" onMouseOut="rowOut('emfM2005020307007','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83045&amp;Bugzilla=83045"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83045" target="_bugz">83045</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] Issue with containment and deleted objects</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200501270700">
                <b class="title">2.0.2M200501270700</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2005012707001" onMouseOver="rowOver('emfM2005012707001','#C0D8FF')" onMouseOut="rowOut('emfM2005012707001','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=83044&amp;Bugzilla=83044"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=83044" target="_bugz">83044</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] caching of Lookup in XMLSaveImpl for major performance boost of serialization</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.2.M200501191212">
                <b class="title">2.0.2M200501191212</b>
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.1.2.0.1">2.0.1 Release</a>(53 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.2.0.1">
                <b class="title">
                  <b>2.0.1 Release</b>
                </b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.11" onMouseOver="rowOver('emf2.0.11','#C0D8FF')" onMouseOut="rowOut('emf2.0.11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Zip support is not working properly</td>
                </tr>
                <tr id="nameemf2.0.12" onMouseOver="rowOver('emf2.0.12','#C0D8FF')" onMouseOut="rowOut('emf2.0.12','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support for backup/secondary/multiple Update URL(s)</td>
                </tr>
                <tr id="nameemf2.0.13" onMouseOver="rowOver('emf2.0.13','#C0D8FF')" onMouseOut="rowOut('emf2.0.13','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Implementation of XMLSave does not scale</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.2.0.1RC2">
                <b class="title">
                  <b>2.0.1RC2</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.1RC21" onMouseOver="rowOver('emf2.0.1RC21','#C0D8FF')" onMouseOut="rowOut('emf2.0.1RC21','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=74075&amp;Bugzilla=74075"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=74075" target="_bugz">74075</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Zip support is not working properly</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.2.0.1RC1">
                <b class="title">
                  <b>2.0.1RC1</b>
                </b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemf2.0.1RC11" onMouseOver="rowOver('emf2.0.1RC11','#C0D8FF')" onMouseOut="rowOut('emf2.0.1RC11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support for backup/secondary/multiple Update URL(s)</td>
                </tr>
                <tr id="nameemf2.0.1RC12" onMouseOver="rowOver('emf2.0.1RC12','#C0D8FF')" onMouseOut="rowOut('emf2.0.1RC12','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf&amp;bug=72967&amp;Bugzilla=72967"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72967" target="_bugz">72967</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Implementation of XMLSave does not scale</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200409011021">
                <b class="title">2.0.1M200409011021</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004090110211" onMouseOver="rowOver('emfM2004090110211','#C0D8FF')" onMouseOut="rowOut('emfM2004090110211','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72875" target="_bugz">72875</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Validator class not generated for derived models which (only) inherit validation methods</td>
                </tr>
                <tr id="nameemfM2004090110212" onMouseOver="rowOver('emfM2004090110212','#C0D8FF')" onMouseOut="rowOut('emfM2004090110212','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[osgi] headers incorrectly cached when a bundle is installed from the update manager</td>
                </tr>
                <tr id="nameemfM2004090110213" onMouseOver="rowOver('emfM2004090110213','#C0D8FF')" onMouseOut="rowOut('emfM2004090110213','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ClassCastException occurs when calling applyAndRerverse()</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200408261626">
                <b class="title">2.0.1M200408261626</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004082616261" onMouseOver="rowOver('emfM2004082616261','#C0D8FF')" onMouseOut="rowOut('emfM2004082616261','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72731" target="_bugz">72731</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Stop encoding platform resource URI by default</td>
                </tr>
                <tr id="nameemfM2004082616262" onMouseOver="rowOver('emfM2004082616262','#C0D8FF')" onMouseOut="rowOut('emfM2004082616262','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72565" target="_bugz">72565</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Chicken and Egg problem in initialization</td>
                </tr>
                <tr id="nameemfM2004082616263" onMouseOver="rowOver('emfM2004082616263','#C0D8FF')" onMouseOut="rowOut('emfM2004082616263','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Extend SetCommand to individual EList members</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200408260844">
                <b class="title">2.0.1M200408260844</b>
              </a>(6 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004082608441" onMouseOver="rowOver('emfM2004082608441','#C0D8FF')" onMouseOut="rowOut('emfM2004082608441','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72675" target="_bugz">72675</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EClassImpl has problem with multi threaded read access</td>
                </tr>
                <tr id="nameemfM2004082608442" onMouseOver="rowOver('emfM2004082608442','#C0D8FF')" onMouseOut="rowOut('emfM2004082608442','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72645" target="_bugz">72645</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Caching mechanism for URIs on ResourceSet (performance improvement)</td>
                </tr>
                <tr id="nameemfM2004082608443" onMouseOver="rowOver('emfM2004082608443','#C0D8FF')" onMouseOut="rowOut('emfM2004082608443','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72538" target="_bugz">72538</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Performance: improve performance of BasicEList.get(int)</td>
                </tr>
                <tr id="nameemfM2004082608444" onMouseOver="rowOver('emfM2004082608444','#C0D8FF')" onMouseOut="rowOut('emfM2004082608444','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72428" target="_bugz">72428</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Invalid validation code generated for minLength / maxLength constrains</td>
                </tr>
                <tr id="nameemfM2004082608445" onMouseOver="rowOver('emfM2004082608445','#C0D8FF')" onMouseOut="rowOut('emfM2004082608445','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72265" target="_bugz">72265</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">New save option w.r.t. xsi/xmi:type</td>
                </tr>
                <tr id="nameemfM2004082608446" onMouseOver="rowOver('emfM2004082608446','#C0D8FF')" onMouseOut="rowOut('emfM2004082608446','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51639" target="_bugz">51639</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Extend SetCommand to individual EList members</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200408190924">
                <b class="title">2.0.1M200408190924</b>
              </a>(9 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004081909241" onMouseOver="rowOver('emfM2004081909241','#C0D8FF')" onMouseOut="rowOut('emfM2004081909241','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72254" target="_bugz">72254</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">PackageNotFoundException in XMLHandler#getPackageForURI(String)</td>
                </tr>
                <tr id="nameemfM2004081909242" onMouseOver="rowOver('emfM2004081909242','#C0D8FF')" onMouseOut="rowOut('emfM2004081909242','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72204" target="_bugz">72204</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">&amp;quot;Initialize by Loading&amp;quot; attribute not reconciled</td>
                </tr>
                <tr id="nameemfM2004081909243" onMouseOver="rowOver('emfM2004081909243','#C0D8FF')" onMouseOut="rowOut('emfM2004081909243','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72194" target="_bugz">72194</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">IllegalStateException when deleting DataObject with read-only EReference</td>
                </tr>
                <tr id="nameemfM2004081909244" onMouseOver="rowOver('emfM2004081909244','#C0D8FF')" onMouseOut="rowOut('emfM2004081909244','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72056" target="_bugz">72056</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XMLHandler.getPAckageForURI has problem with java: protocol</td>
                </tr>
                <tr id="nameemfM2004081909245" onMouseOver="rowOver('emfM2004081909245','#C0D8FF')" onMouseOut="rowOut('emfM2004081909245','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72014" target="_bugz">72014</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Negative xsd:durations are output incorrectly</td>
                </tr>
                <tr id="nameemfM2004081909246" onMouseOver="rowOver('emfM2004081909246','#C0D8FF')" onMouseOut="rowOut('emfM2004081909246','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support frozen Ecore instances for improved performance</td>
                </tr>
                <tr id="nameemfM2004081909247" onMouseOver="rowOver('emfM2004081909247','#C0D8FF')" onMouseOut="rowOut('emfM2004081909247','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71509" target="_bugz">71509</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">caching the costly to build eClassFeatureNamePairToEStructuralFeatureMap across deserializations.</td>
                </tr>
                <tr id="nameemfM2004081909248" onMouseOver="rowOver('emfM2004081909248','#C0D8FF')" onMouseOut="rowOut('emfM2004081909248','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70563" target="_bugz">70563</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Error using the xpath accessor when object doesn't exist</td>
                </tr>
                <tr id="nameemfM2004081909249" onMouseOver="rowOver('emfM2004081909249','#C0D8FF')" onMouseOut="rowOut('emfM2004081909249','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69680" target="_bugz">69680</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">problems with '#' character in file or folder names</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200408120834">
                <b class="title">2.0.1M200408120834</b>
              </a>(12 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004081208341" onMouseOver="rowOver('emfM2004081208341','#C0D8FF')" onMouseOut="rowOut('emfM2004081208341','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support frozen Ecore instances for improved performance</td>
                </tr>
                <tr id="nameemfM2004081208342" onMouseOver="rowOver('emfM2004081208342','#C0D8FF')" onMouseOut="rowOut('emfM2004081208342','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71834" target="_bugz">71834</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Improve performance in ChangeRecorder.handlerFeature path</td>
                </tr>
                <tr id="nameemfM2004081208343" onMouseOver="rowOver('emfM2004081208343','#C0D8FF')" onMouseOut="rowOut('emfM2004081208343','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71681" target="_bugz">71681</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JMerge does not  attempt to invoke setFlags on interfaces</td>
                </tr>
                <tr id="nameemfM2004081208344" onMouseOver="rowOver('emfM2004081208344','#C0D8FF')" onMouseOut="rowOut('emfM2004081208344','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71599" target="_bugz">71599</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Improve performance of BasicEList.getNonDuplicates/getDuplicates for lists with useEquals false.</td>
                </tr>
                <tr id="nameemfM2004081208345" onMouseOver="rowOver('emfM2004081208345','#C0D8FF')" onMouseOut="rowOut('emfM2004081208345','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71597" target="_bugz">71597</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support XMLResource.OPTION_SCHEMA_LOCATION_IMPLEMENTATION to optionally save the generated package interface name</td>
                </tr>
                <tr id="nameemfM2004081208346" onMouseOver="rowOver('emfM2004081208346','#C0D8FF')" onMouseOut="rowOut('emfM2004081208346','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71580" target="_bugz">71580</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JavaJet creates templates that don't compile</td>
                </tr>
                <tr id="nameemfM2004081208347" onMouseOver="rowOver('emfM2004081208347','#C0D8FF')" onMouseOut="rowOut('emfM2004081208347','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71565" target="_bugz">71565</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">TVT3.0:  Default window size for Referenced generator models too small</td>
                </tr>
                <tr id="nameemfM2004081208348" onMouseOver="rowOver('emfM2004081208348','#C0D8FF')" onMouseOut="rowOut('emfM2004081208348','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71523" target="_bugz">71523</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Avoid null pointer exception in GenBaseImpl.setImportManager</td>
                </tr>
                <tr id="nameemfM2004081208349" onMouseOver="rowOver('emfM2004081208349','#C0D8FF')" onMouseOut="rowOut('emfM2004081208349','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71487" target="_bugz">71487</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Criteria for Boolean property editor</td>
                </tr>
                <tr id="nameemfM20040812083410" onMouseOver="rowOver('emfM20040812083410','#C0D8FF')" onMouseOut="rowOut('emfM20040812083410','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71465" target="_bugz">71465</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Performance: SDO DataObject getters and setters</td>
                </tr>
                <tr id="nameemfM20040812083411" onMouseOver="rowOver('emfM20040812083411','#C0D8FF')" onMouseOut="rowOut('emfM20040812083411','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71034" target="_bugz">71034</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ChangeRecorder objects accumulating in eAdapters list</td>
                </tr>
                <tr id="nameemfM20040812083412" onMouseOver="rowOver('emfM20040812083412','#C0D8FF')" onMouseOut="rowOut('emfM20040812083412','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70423" target="_bugz">70423</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Make EChangeSummay=ry#isLogging non-transient</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200408040957">
                <b class="title">2.0.1M200408040957</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004080409571" onMouseOver="rowOver('emfM2004080409571','#C0D8FF')" onMouseOut="rowOut('emfM2004080409571','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71314" target="_bugz">71314</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Reference to empty enumeration will lead to failure during Model code generation</td>
                </tr>
                <tr id="nameemfM2004080409572" onMouseOver="rowOver('emfM2004080409572','#C0D8FF')" onMouseOut="rowOut('emfM2004080409572','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71305" target="_bugz">71305</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Race condition in ETypeImpl::getPropertiesGen</td>
                </tr>
                <tr id="nameemfM2004080409573" onMouseOver="rowOver('emfM2004080409573','#C0D8FF')" onMouseOut="rowOut('emfM2004080409573','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68564" target="_bugz">68564</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Enum code generation is bad</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200407280859">
                <b class="title">2.0.1M200407280859</b>
              </a>(5 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004072808591" onMouseOver="rowOver('emfM2004072808591','#C0D8FF')" onMouseOut="rowOut('emfM2004072808591','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70789" target="_bugz">70789</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Validation: runtime dependency from org.eclipse.core.runtime.IStatus</td>
                </tr>
                <tr id="nameemfM2004072808592" onMouseOver="rowOver('emfM2004072808592','#C0D8FF')" onMouseOut="rowOut('emfM2004072808592','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70583" target="_bugz">70583</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Performance EObjectImpl and ChangeRecorder</td>
                </tr>
                <tr id="nameemfM2004072808593" onMouseOver="rowOver('emfM2004072808593','#C0D8FF')" onMouseOut="rowOut('emfM2004072808593','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70560" target="_bugz">70560</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Changing an object breaks old container</td>
                </tr>
                <tr id="nameemfM2004072808594" onMouseOver="rowOver('emfM2004072808594','#C0D8FF')" onMouseOut="rowOut('emfM2004072808594','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70559" target="_bugz">70559</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">SDO: Deleting a DataObject should only process unsettable features</td>
                </tr>
                <tr id="nameemfM2004072808595" onMouseOver="rowOver('emfM2004072808595','#C0D8FF')" onMouseOut="rowOut('emfM2004072808595','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70031" target="_bugz">70031</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Getting a java.lang.IllegalArgumentException exception while generating XSD Schema</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200407211027">
                <b class="title">2.0.1M200407211027</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.1.M200407150937">
                <b class="title">2.0.1M200407150937</b>
              </a>(6 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfM2004071509371" onMouseOver="rowOver('emfM2004071509371','#C0D8FF')" onMouseOut="rowOut('emfM2004071509371','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69576" target="_bugz">69576</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Named constraints are only validated at sub-classes</td>
                </tr>
                <tr id="nameemfM2004071509372" onMouseOver="rowOver('emfM2004071509372','#C0D8FF')" onMouseOut="rowOut('emfM2004071509372','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69525" target="_bugz">69525</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Codegen Failure in EMF 06280827 Level</td>
                </tr>
                <tr id="nameemfM2004071509373" onMouseOver="rowOver('emfM2004071509373','#C0D8FF')" onMouseOut="rowOut('emfM2004071509373','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69270" target="_bugz">69270</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Generate Schema action problems</td>
                </tr>
                <tr id="nameemfM2004071509374" onMouseOver="rowOver('emfM2004071509374','#C0D8FF')" onMouseOut="rowOut('emfM2004071509374','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69029" target="_bugz">69029</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">SDO fails when using settings like setLong(data/value[i], 1)</td>
                </tr>
                <tr id="nameemfM2004071509375" onMouseOver="rowOver('emfM2004071509375','#C0D8FF')" onMouseOut="rowOut('emfM2004071509375','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67708" target="_bugz">67708</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[JET] project&amp;gt;JET Settings&amp;gt;Template Containers should allow plugin references</td>
                </tr>
                <tr id="nameemfM2004071509376" onMouseOver="rowOver('emfM2004071509376','#C0D8FF')" onMouseOut="rowOut('emfM2004071509376','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Accessibility: FeatureEditorDialog not Accessible compliant: Text widget focus not readable</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="emf.2.0.0.2.0.0">2.0.0 Release</a>(171 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.2.0.0">
                <b class="title">
                  <b>2.0.0 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406250129">
                <b class="title">2.0.0I200406250129</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406241017">
                <b class="title">2.0.0I200406241017</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004062410171" onMouseOver="rowOver('emfI2004062410171','#C0D8FF')" onMouseOut="rowOut('emfI2004062410171','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68465" target="_bugz">68465</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Schema errors not linked to offending file</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406231126">
                <b class="title">2.0.0I200406231126</b>
              </a>(4 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004062311261" onMouseOver="rowOver('emfI2004062311261','#C0D8FF')" onMouseOut="rowOut('emfI2004062311261','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68310" target="_bugz">68310</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ChangeRecorder doesn't pick up new contents</td>
                </tr>
                <tr id="nameemfI2004062311262" onMouseOver="rowOver('emfI2004062311262','#C0D8FF')" onMouseOut="rowOut('emfI2004062311262','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68256" target="_bugz">68256</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NPE in XMLHelperImpl</td>
                </tr>
                <tr id="nameemfI2004062311263" onMouseOver="rowOver('emfI2004062311263','#C0D8FF')" onMouseOut="rowOut('emfI2004062311263','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68200" target="_bugz">68200</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">IndexOutOfBoundsException in ChangeRecorder</td>
                </tr>
                <tr id="nameemfI2004062311264" onMouseOver="rowOver('emfI2004062311264','#C0D8FF')" onMouseOut="rowOut('emfI2004062311264','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68198" target="_bugz">68198</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Dirty flag does not work when undo-redo</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406221136">
                <b class="title">2.0.0I200406221136</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004062211361" onMouseOver="rowOver('emfI2004062211361','#C0D8FF')" onMouseOut="rowOut('emfI2004062211361','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68099" target="_bugz">68099</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ClassCastException occurs when calling applyAndRerverse()</td>
                </tr>
                <tr id="nameemfI2004062211362" onMouseOver="rowOver('emfI2004062211362','#C0D8FF')" onMouseOut="rowOut('emfI2004062211362','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=68068" target="_bugz">68068</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JET Compiler not handling files from Linux correctly</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406211000">
                <b class="title">2.0.0I200406211000</b>
              </a>(8 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004062110001" onMouseOver="rowOver('emfI2004062110001','#C0D8FF')" onMouseOut="rowOut('emfI2004062110001','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67992" target="_bugz">67992</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide more flexibility in the package registry implementation</td>
                </tr>
                <tr id="nameemfI2004062110002" onMouseOver="rowOver('emfI2004062110002','#C0D8FF')" onMouseOut="rowOut('emfI2004062110002','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature) gives bad result for open content features</td>
                </tr>
                <tr id="nameemfI2004062110003" onMouseOver="rowOver('emfI2004062110003','#C0D8FF')" onMouseOut="rowOut('emfI2004062110003','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67863" target="_bugz">67863</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EcoreUtil.UsageCrossReferencer ignores derived features</td>
                </tr>
                <tr id="nameemfI2004062110004" onMouseOver="rowOver('emfI2004062110004','#C0D8FF')" onMouseOut="rowOut('emfI2004062110004','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67860" target="_bugz">67860</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ItemPropertyDescriptor#getPropertyValue(Object) should not call eIsSet() for attributes</td>
                </tr>
                <tr id="nameemfI2004062110005" onMouseOver="rowOver('emfI2004062110005','#C0D8FF')" onMouseOut="rowOut('emfI2004062110005','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67826" target="_bugz">67826</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">SDO Editor broken for several reasons</td>
                </tr>
                <tr id="nameemfI2004062110006" onMouseOver="rowOver('emfI2004062110006','#C0D8FF')" onMouseOut="rowOut('emfI2004062110006','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67783" target="_bugz">67783</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support caching of extended metadata</td>
                </tr>
                <tr id="nameemfI2004062110007" onMouseOver="rowOver('emfI2004062110007','#C0D8FF')" onMouseOut="rowOut('emfI2004062110007','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67748" target="_bugz">67748</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">(STATIC)ChangeSummary.setting.getValue() returns null for date</td>
                </tr>
                <tr id="nameemfI2004062110008" onMouseOver="rowOver('emfI2004062110008','#C0D8FF')" onMouseOut="rowOut('emfI2004062110008','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67720" target="_bugz">67720</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Jar-like archive URI behaviour for zip and other schemes</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406171028">
                <b class="title">2.0.0I200406171028</b>
              </a>(6 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004061710281" onMouseOver="rowOver('emfI2004061710281','#C0D8FF')" onMouseOut="rowOut('emfI2004061710281','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67635" target="_bugz">67635</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add utility methods to create QName objects</td>
                </tr>
                <tr id="nameemfI2004061710282" onMouseOver="rowOver('emfI2004061710282','#C0D8FF')" onMouseOut="rowOut('emfI2004061710282','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67493" target="_bugz">67493</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">bad trailing null character at the end in base64 type</td>
                </tr>
                <tr id="nameemfI2004061710283" onMouseOver="rowOver('emfI2004061710283','#C0D8FF')" onMouseOut="rowOut('emfI2004061710283','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67445" target="_bugz">67445</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">GenClassImpl#getSharedClassCreateChildFeatures() is non-deterministic</td>
                </tr>
                <tr id="nameemfI2004061710284" onMouseOver="rowOver('emfI2004061710284','#C0D8FF')" onMouseOut="rowOut('emfI2004061710284','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67162" target="_bugz">67162</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">RCP Application</td>
                </tr>
                <tr id="nameemfI2004061710285" onMouseOver="rowOver('emfI2004061710285','#C0D8FF')" onMouseOut="rowOut('emfI2004061710285','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66944" target="_bugz">66944</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Incorrect order of parameters in call to this in ItemPropertyDescriptor causes null Category and broken static image</td>
                </tr>
                <tr id="nameemfI2004061710286" onMouseOver="rowOver('emfI2004061710286','#C0D8FF')" onMouseOut="rowOut('emfI2004061710286','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Fix EMF editors to avoid new null selection assertion in SelectionChangedEvent in RC2</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406100948">
                <b class="title">2.0.0I200406100948</b>
              </a>(16 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004061009481" onMouseOver="rowOver('emfI2004061009481','#C0D8FF')" onMouseOut="rowOut('emfI2004061009481','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66367" target="_bugz">66367</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DataObject.createDataObject for open content feature in repeating wildcard breaks</td>
                </tr>
                <tr id="nameemfI2004061009482" onMouseOver="rowOver('emfI2004061009482','#C0D8FF')" onMouseOut="rowOut('emfI2004061009482','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66365" target="_bugz">66365</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Accessibility: FeatureEditorDialog not Accessible compliant: Text widget focus not readable</td>
                </tr>
                <tr id="nameemfI2004061009483" onMouseOver="rowOver('emfI2004061009483','#C0D8FF')" onMouseOut="rowOut('emfI2004061009483','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66361" target="_bugz">66361</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Accessibility: LoadResourceDialog not Accessible compliant:  Text overwrites button</td>
                </tr>
                <tr id="nameemfI2004061009484" onMouseOver="rowOver('emfI2004061009484','#C0D8FF')" onMouseOut="rowOut('emfI2004061009484','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Avoid the use of CCombo in the generated wizards.</td>
                </tr>
                <tr id="nameemfI2004061009485" onMouseOver="rowOver('emfI2004061009485','#C0D8FF')" onMouseOut="rowOut('emfI2004061009485','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support ecore:ignore for facets, XSDAnnotation, &amp;lt;documentation&amp;gt;, and &amp;lt;appinfo&amp;gt;.</td>
                </tr>
                <tr id="nameemfI2004061009486" onMouseOver="rowOver('emfI2004061009486','#C0D8FF')" onMouseOut="rowOut('emfI2004061009486','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66118" target="_bugz">66118</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Platform.resolve() does not produce a hierarchical URI</td>
                </tr>
                <tr id="nameemfI2004061009487" onMouseOver="rowOver('emfI2004061009487','#C0D8FF')" onMouseOut="rowOut('emfI2004061009487','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Complete the support for validating according to XML Schema simple facets</td>
                </tr>
                <tr id="nameemfI2004061009488" onMouseOver="rowOver('emfI2004061009488','#C0D8FF')" onMouseOut="rowOut('emfI2004061009488','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66038" target="_bugz">66038</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">hrefs missing after saving recorded unknown features</td>
                </tr>
                <tr id="nameemfI2004061009489" onMouseOver="rowOver('emfI2004061009489','#C0D8FF')" onMouseOut="rowOut('emfI2004061009489','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66037" target="_bugz">66037</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">schemaLocation bypassed when using extended metadata</td>
                </tr>
                <tr id="nameemfI20040610094810" onMouseOver="rowOver('emfI20040610094810','#C0D8FF')" onMouseOut="rowOut('emfI20040610094810','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add activities to EMF and XSD</td>
                </tr>
                <tr id="nameemfI20040610094811" onMouseOver="rowOver('emfI20040610094811','#C0D8FF')" onMouseOut="rowOut('emfI20040610094811','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65730" target="_bugz">65730</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ArrayIndexOutOfBoundsException in BasicCommandStack</td>
                </tr>
                <tr id="nameemfI20040610094812" onMouseOver="rowOver('emfI20040610094812','#C0D8FF')" onMouseOut="rowOut('emfI20040610094812','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65725" target="_bugz">65725</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ClassCastException in ChangeRecorder</td>
                </tr>
                <tr id="nameemfI20040610094813" onMouseOver="rowOver('emfI20040610094813','#C0D8FF')" onMouseOut="rowOut('emfI20040610094813','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65700" target="_bugz">65700</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Exception calling hasPrevious in ListIterator</td>
                </tr>
                <tr id="nameemfI20040610094814" onMouseOver="rowOver('emfI20040610094814','#C0D8FF')" onMouseOut="rowOut('emfI20040610094814','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65605" target="_bugz">65605</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problem with SDOUtil.setInt()</td>
                </tr>
                <tr id="nameemfI20040610094815" onMouseOver="rowOver('emfI20040610094815','#C0D8FF')" onMouseOut="rowOut('emfI20040610094815','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JMerge: pull of exception, superclass don't work if getter returns null</td>
                </tr>
                <tr id="nameemfI20040610094816" onMouseOver="rowOver('emfI20040610094816','#C0D8FF')" onMouseOut="rowOut('emfI20040610094816','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Generate deployable plug-ins</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200406030436">
                <b class="title">2.0.0I200406030436</b>
              </a>(18 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004060304361" onMouseOver="rowOver('emfI2004060304361','#C0D8FF')" onMouseOut="rowOut('emfI2004060304361','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65159" target="_bugz">65159</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JMerge: pull of exception, superclass don't work if getter returns null</td>
                </tr>
                <tr id="nameemfI2004060304362" onMouseOver="rowOver('emfI2004060304362','#C0D8FF')" onMouseOut="rowOut('emfI2004060304362','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65082" target="_bugz">65082</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">nsPrefix ignored in EMOF file</td>
                </tr>
                <tr id="nameemfI2004060304363" onMouseOver="rowOver('emfI2004060304363','#C0D8FF')" onMouseOut="rowOut('emfI2004060304363','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65064" target="_bugz">65064</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NPE in EMFPlugin#getString(String)</td>
                </tr>
                <tr id="nameemfI2004060304364" onMouseOver="rowOver('emfI2004060304364','#C0D8FF')" onMouseOut="rowOut('emfI2004060304364','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64734" target="_bugz">64734</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EEnumLiterals (and Booleans) not localized</td>
                </tr>
                <tr id="nameemfI2004060304365" onMouseOver="rowOver('emfI2004060304365','#C0D8FF')" onMouseOut="rowOut('emfI2004060304365','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64535" target="_bugz">64535</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ItemProvider.factorAddCommand should correct the index</td>
                </tr>
                <tr id="nameemfI2004060304366" onMouseOver="rowOver('emfI2004060304366','#C0D8FF')" onMouseOut="rowOut('emfI2004060304366','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64374" target="_bugz">64374</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JMerge: JPatternDictionary NullPointerException</td>
                </tr>
                <tr id="nameemfI2004060304367" onMouseOver="rowOver('emfI2004060304367','#C0D8FF')" onMouseOut="rowOut('emfI2004060304367','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64309" target="_bugz">64309</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">generated model editor fails to create model and crashes</td>
                </tr>
                <tr id="nameemfI2004060304368" onMouseOver="rowOver('emfI2004060304368','#C0D8FF')" onMouseOut="rowOut('emfI2004060304368','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64217" target="_bugz">64217</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">MappingRootImpl's createNotification() needs extra arg</td>
                </tr>
                <tr id="nameemfI2004060304369" onMouseOver="rowOver('emfI2004060304369','#C0D8FF')" onMouseOut="rowOut('emfI2004060304369','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63821" target="_bugz">63821</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">IllegalArgumentException when opening properties view</td>
                </tr>
                <tr id="nameemfI20040603043610" onMouseOver="rowOver('emfI20040603043610','#C0D8FF')" onMouseOut="rowOut('emfI20040603043610','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63497" target="_bugz">63497</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add XML Schema datatype validation for XMLTypeFactory</td>
                </tr>
                <tr id="nameemfI20040603043611" onMouseOver="rowOver('emfI20040603043611','#C0D8FF')" onMouseOut="rowOut('emfI20040603043611','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63117" target="_bugz">63117</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Proper static code generation for Store scenario</td>
                </tr>
                <tr id="nameemfI20040603043612" onMouseOver="rowOver('emfI20040603043612','#C0D8FF')" onMouseOut="rowOut('emfI20040603043612','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Enhancement to enable dynamic and generated EPackage usage across JVMs</td>
                </tr>
                <tr id="nameemfI20040603043613" onMouseOver="rowOver('emfI20040603043613','#C0D8FF')" onMouseOut="rowOut('emfI20040603043613','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61210" target="_bugz">61210</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Drag and Drop with non-containment references not working</td>
                </tr>
                <tr id="nameemfI20040603043614" onMouseOver="rowOver('emfI20040603043614','#C0D8FF')" onMouseOut="rowOut('emfI20040603043614','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57593" target="_bugz">57593</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">64k method limit</td>
                </tr>
                <tr id="nameemfI20040603043615" onMouseOver="rowOver('emfI20040603043615','#C0D8FF')" onMouseOut="rowOut('emfI20040603043615','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56076" target="_bugz">56076</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Generate deployable plug-ins</td>
                </tr>
                <tr id="nameemfI20040603043616" onMouseOver="rowOver('emfI20040603043616','#C0D8FF')" onMouseOut="rowOut('emfI20040603043616','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47327" target="_bugz">47327</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">source editor not dirty on D?D move</td>
                </tr>
                <tr id="nameemfI20040603043617" onMouseOver="rowOver('emfI20040603043617','#C0D8FF')" onMouseOut="rowOut('emfI20040603043617','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47201" target="_bugz">47201</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Generated editor permits save on readonly files</td>
                </tr>
                <tr id="nameemfI20040603043618" onMouseOver="rowOver('emfI20040603043618','#C0D8FF')" onMouseOut="rowOut('emfI20040603043618','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39618" target="_bugz">39618</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Improve label feature search algorithm</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200405200923">
                <b class="title">2.0.0I200405200923</b>
              </a>(11 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004052009231" onMouseOver="rowOver('emfI2004052009231','#C0D8FF')" onMouseOut="rowOut('emfI2004052009231','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63079" target="_bugz">63079</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ClassCastException when generating model code</td>
                </tr>
                <tr id="nameemfI2004052009232" onMouseOver="rowOver('emfI2004052009232','#C0D8FF')" onMouseOut="rowOut('emfI2004052009232','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62988" target="_bugz">62988</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Attribute wildcards do not work correctly.</td>
                </tr>
                <tr id="nameemfI2004052009233" onMouseOver="rowOver('emfI2004052009233','#C0D8FF')" onMouseOut="rowOut('emfI2004052009233','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62898" target="_bugz">62898</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JavaEcoreBuilder: mark &amp;quot;dummy&amp;quot; EClasses as interfaces</td>
                </tr>
                <tr id="nameemfI2004052009234" onMouseOver="rowOver('emfI2004052009234','#C0D8FF')" onMouseOut="rowOut('emfI2004052009234','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62471" target="_bugz">62471</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">FeatureMap.toArray() not implemented correctly</td>
                </tr>
                <tr id="nameemfI2004052009235" onMouseOver="rowOver('emfI2004052009235','#C0D8FF')" onMouseOut="rowOut('emfI2004052009235','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62452" target="_bugz">62452</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">...provider.&amp;lt;model&amp;gt;EditPlugin class generated in wrong place</td>
                </tr>
                <tr id="nameemfI2004052009236" onMouseOver="rowOver('emfI2004052009236','#C0D8FF')" onMouseOut="rowOut('emfI2004052009236','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support generator control over runtime compatibility and Rich Client Platform</td>
                </tr>
                <tr id="nameemfI2004052009237" onMouseOver="rowOver('emfI2004052009237','#C0D8FF')" onMouseOut="rowOut('emfI2004052009237','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62275" target="_bugz">62275</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">CopyCommand should not copy unchangeable or derived features</td>
                </tr>
                <tr id="nameemfI2004052009238" onMouseOver="rowOver('emfI2004052009238','#C0D8FF')" onMouseOut="rowOut('emfI2004052009238','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62181" target="_bugz">62181</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EDataObject.getProperties() for static/dynamic properties</td>
                </tr>
                <tr id="nameemfI2004052009239" onMouseOver="rowOver('emfI2004052009239','#C0D8FF')" onMouseOut="rowOut('emfI2004052009239','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61601" target="_bugz">61601</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">getOldContainer and getOldContainingProperty on EChangeSummary</td>
                </tr>
                <tr id="nameemfI20040520092310" onMouseOver="rowOver('emfI20040520092310','#C0D8FF')" onMouseOut="rowOut('emfI20040520092310','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61595" target="_bugz">61595</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Mark StructuralFeature  as &amp;quot;read-only&amp;quot;</td>
                </tr>
                <tr id="nameemfI20040520092311" onMouseOver="rowOver('emfI20040520092311','#C0D8FF')" onMouseOut="rowOut('emfI20040520092311','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57865" target="_bugz">57865</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">The ok button can not be seen on the default size of &amp;quot;Import Primitive Type&amp;quot; window.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200405131028">
                <b class="title">2.0.0I200405131028</b>
              </a>(18 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004051310281" onMouseOver="rowOver('emfI2004051310281','#C0D8FF')" onMouseOut="rowOut('emfI2004051310281','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62030" target="_bugz">62030</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add support for XML Schema QName datatype</td>
                </tr>
                <tr id="nameemfI2004051310282" onMouseOver="rowOver('emfI2004051310282','#C0D8FF')" onMouseOut="rowOut('emfI2004051310282','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62026" target="_bugz">62026</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NullPointerException in LoadResourceAction</td>
                </tr>
                <tr id="nameemfI2004051310283" onMouseOver="rowOver('emfI2004051310283','#C0D8FF')" onMouseOut="rowOut('emfI2004051310283','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62025" target="_bugz">62025</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">SDO Data Conversion</td>
                </tr>
                <tr id="nameemfI2004051310284" onMouseOver="rowOver('emfI2004051310284','#C0D8FF')" onMouseOut="rowOut('emfI2004051310284','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61929" target="_bugz">61929</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Inadequate error message from SDO</td>
                </tr>
                <tr id="nameemfI2004051310285" onMouseOver="rowOver('emfI2004051310285','#C0D8FF')" onMouseOut="rowOut('emfI2004051310285','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61816" target="_bugz">61816</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Empty exceptions when trying import model from annoted Java file</td>
                </tr>
                <tr id="nameemfI2004051310286" onMouseOver="rowOver('emfI2004051310286','#C0D8FF')" onMouseOut="rowOut('emfI2004051310286','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61711" target="_bugz">61711</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Make &amp;quot;built in&amp;quot; Ecore types always available in Ecore sample editor</td>
                </tr>
                <tr id="nameemfI2004051310287" onMouseOver="rowOver('emfI2004051310287','#C0D8FF')" onMouseOut="rowOut('emfI2004051310287','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61640" target="_bugz">61640</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ItemPropertyDescriptor should get the editing domain from the item's adapter factory before its root adapter factory.</td>
                </tr>
                <tr id="nameemfI2004051310288" onMouseOver="rowOver('emfI2004051310288','#C0D8FF')" onMouseOut="rowOut('emfI2004051310288','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61503" target="_bugz">61503</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Logic for proxy validation is incorrect</td>
                </tr>
                <tr id="nameemfI2004051310289" onMouseOver="rowOver('emfI2004051310289','#C0D8FF')" onMouseOut="rowOut('emfI2004051310289','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61502" target="_bugz">61502</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">No busy/progess indicator for long validation operations</td>
                </tr>
                <tr id="nameemfI20040513102810" onMouseOver="rowOver('emfI20040513102810','#C0D8FF')" onMouseOut="rowOut('emfI20040513102810','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61501" target="_bugz">61501</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Validate action not available from the Editor menu</td>
                </tr>
                <tr id="nameemfI20040513102811" onMouseOver="rowOver('emfI20040513102811','#C0D8FF')" onMouseOut="rowOut('emfI20040513102811','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61500" target="_bugz">61500</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Validate action creates markers of incorrect severity</td>
                </tr>
                <tr id="nameemfI20040513102812" onMouseOver="rowOver('emfI20040513102812','#C0D8FF')" onMouseOut="rowOut('emfI20040513102812','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61495" target="_bugz">61495</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NullPointerException if diagnostic data is empty</td>
                </tr>
                <tr id="nameemfI20040513102813" onMouseOver="rowOver('emfI20040513102813','#C0D8FF')" onMouseOut="rowOut('emfI20040513102813','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61493" target="_bugz">61493</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Diagnostician does not correctly validate contents</td>
                </tr>
                <tr id="nameemfI20040513102814" onMouseOver="rowOver('emfI20040513102814','#C0D8FF')" onMouseOut="rowOut('emfI20040513102814','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61465" target="_bugz">61465</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Handle feature name collisions with root implements interface operations</td>
                </tr>
                <tr id="nameemfI20040513102815" onMouseOver="rowOver('emfI20040513102815','#C0D8FF')" onMouseOut="rowOut('emfI20040513102815','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61302" target="_bugz">61302</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support ESequence.add(String text) and (int index, String text)</td>
                </tr>
                <tr id="nameemfI20040513102816" onMouseOver="rowOver('emfI20040513102816','#C0D8FF')" onMouseOut="rowOut('emfI20040513102816','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60854" target="_bugz">60854</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BIDI: Hebrew text is corrupted in the GenModel name.</td>
                </tr>
                <tr id="nameemfI20040513102817" onMouseOver="rowOver('emfI20040513102817','#C0D8FF')" onMouseOut="rowOut('emfI20040513102817','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide better default substitution group/abstract element support and provide ecore:featureMap and ecore:mixed for more flexible control</td>
                </tr>
                <tr id="nameemfI20040513102818" onMouseOver="rowOver('emfI20040513102818','#C0D8FF')" onMouseOut="rowOut('emfI20040513102818','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58244" target="_bugz">58244</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DBCS: The &amp;lt;NLlibrary&amp;gt;.library model project can not be create in Runtime-workbench.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200405060858">
                <b class="title">2.0.0I200405060858</b>
              </a>(6 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004050608581" onMouseOver="rowOver('emfI2004050608581','#C0D8FF')" onMouseOut="rowOut('emfI2004050608581','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add the first version of a constraint validation framework</td>
                </tr>
                <tr id="nameemfI2004050608582" onMouseOver="rowOver('emfI2004050608582','#C0D8FF')" onMouseOut="rowOut('emfI2004050608582','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60731" target="_bugz">60731</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Removing handle from empty BasicEMap throws /zero exception</td>
                </tr>
                <tr id="nameemfI2004050608583" onMouseOver="rowOver('emfI2004050608583','#C0D8FF')" onMouseOut="rowOut('emfI2004050608583','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60603" target="_bugz">60603</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">References property descriptor missing for EAnnotations</td>
                </tr>
                <tr id="nameemfI2004050608584" onMouseOver="rowOver('emfI2004050608584','#C0D8FF')" onMouseOut="rowOut('emfI2004050608584','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60602" target="_bugz">60602</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Initialization of generated packages doesn't set EStructuralFeature::ordered attribute</td>
                </tr>
                <tr id="nameemfI2004050608585" onMouseOver="rowOver('emfI2004050608585','#C0D8FF')" onMouseOut="rowOut('emfI2004050608585','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BasicEMap iterator provides a null value after removing one or more entries</td>
                </tr>
                <tr id="nameemfI2004050608586" onMouseOver="rowOver('emfI2004050608586','#C0D8FF')" onMouseOut="rowOut('emfI2004050608586','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Separate EditingDomain per Resource</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200404291310">
                <b class="title">2.0.0I200404291310</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004042913101" onMouseOver="rowOver('emfI2004042913101','#C0D8FF')" onMouseOut="rowOut('emfI2004042913101','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60535" target="_bugz">60535</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BasicEMap iterator provides a null value after removing one or more entries</td>
                </tr>
                <tr id="nameemfI2004042913102" onMouseOver="rowOver('emfI2004042913102','#C0D8FF')" onMouseOut="rowOut('emfI2004042913102','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60224" target="_bugz">60224</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Separate EditingDomain per Resource</td>
                </tr>
                <tr id="nameemfI2004042913103" onMouseOver="rowOver('emfI2004042913103','#C0D8FF')" onMouseOut="rowOut('emfI2004042913103','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">createFromString doesn't trigger an error on unknown Enum values</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200404281648">
                <b class="title">2.0.0I200404281648</b>
              </a>(17 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004042816481" onMouseOver="rowOver('emfI2004042816481','#C0D8FF')" onMouseOut="rowOut('emfI2004042816481','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60151" target="_bugz">60151</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">instances; an editor is also provided in org.eclipse.emf.mapping.ecore2ecore.editor.org.eclipse.emf.mapping.ecore2ecore, provides a model for mapping between EcoreEcore to Ecore mapping model. A new plug-in,</td>
                </tr>
                <tr id="nameemfI2004042816482" onMouseOver="rowOver('emfI2004042816482','#C0D8FF')" onMouseOut="rowOut('emfI2004042816482','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59688" target="_bugz">59688</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ECoreutil.remove(object, feature, value) should do unset</td>
                </tr>
                <tr id="nameemfI2004042816483" onMouseOver="rowOver('emfI2004042816483','#C0D8FF')" onMouseOut="rowOut('emfI2004042816483','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59637" target="_bugz">59637</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">An element of type anyURI mapped to an EReference is improperly handled</td>
                </tr>
                <tr id="nameemfI2004042816484" onMouseOver="rowOver('emfI2004042816484','#C0D8FF')" onMouseOut="rowOut('emfI2004042816484','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59582" target="_bugz">59582</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DBCS: Garbage code be showed  of  library child's name  in runtime workbench.</td>
                </tr>
                <tr id="nameemfI2004042816485" onMouseOver="rowOver('emfI2004042816485','#C0D8FF')" onMouseOut="rowOut('emfI2004042816485','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59536" target="_bugz">59536</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XMLSaveImpl.saveHRefMany resolves references</td>
                </tr>
                <tr id="nameemfI2004042816486" onMouseOver="rowOver('emfI2004042816486','#C0D8FF')" onMouseOut="rowOut('emfI2004042816486','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59465" target="_bugz">59465</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ActionBarContributor template problems when generating without creation commands</td>
                </tr>
                <tr id="nameemfI2004042816487" onMouseOver="rowOver('emfI2004042816487','#C0D8FF')" onMouseOut="rowOut('emfI2004042816487','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59463" target="_bugz">59463</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">createFromString does'n trigger an error on unknown Enum values</td>
                </tr>
                <tr id="nameemfI2004042816488" onMouseOver="rowOver('emfI2004042816488','#C0D8FF')" onMouseOut="rowOut('emfI2004042816488','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=59240" target="_bugz">59240</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BasicCommandStack.flush() method doesn't reset mostRecentCommand</td>
                </tr>
                <tr id="nameemfI2004042816489" onMouseOver="rowOver('emfI2004042816489','#C0D8FF')" onMouseOut="rowOut('emfI2004042816489','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58472" target="_bugz">58472</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NPE reading annotated Java class</td>
                </tr>
                <tr id="nameemfI20040428164810" onMouseOver="rowOver('emfI20040428164810','#C0D8FF')" onMouseOut="rowOut('emfI20040428164810','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58208" target="_bugz">58208</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problem in FeatureChangeImpl.applyAndReverse() method</td>
                </tr>
                <tr id="nameemfI20040428164811" onMouseOver="rowOver('emfI20040428164811','#C0D8FF')" onMouseOut="rowOut('emfI20040428164811','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58132" target="_bugz">58132</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DBCS: generated extra text field on UTF-8 template with BOM</td>
                </tr>
                <tr id="nameemfI20040428164812" onMouseOver="rowOver('emfI20040428164812','#C0D8FF')" onMouseOut="rowOut('emfI20040428164812','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57654" target="_bugz">57654</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">implement caching mechanism in URI to reduce repetative String parse costs</td>
                </tr>
                <tr id="nameemfI20040428164813" onMouseOver="rowOver('emfI20040428164813','#C0D8FF')" onMouseOut="rowOut('emfI20040428164813','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57653" target="_bugz">57653</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Don't revalidate new URIs created from existing validated URIs.</td>
                </tr>
                <tr id="nameemfI20040428164814" onMouseOver="rowOver('emfI20040428164814','#C0D8FF')" onMouseOut="rowOut('emfI20040428164814','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57474" target="_bugz">57474</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Specifying an Exception in method causes a problem</td>
                </tr>
                <tr id="nameemfI20040428164815" onMouseOver="rowOver('emfI20040428164815','#C0D8FF')" onMouseOut="rowOut('emfI20040428164815','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51917" target="_bugz">51917</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add command line option(s) to control generator parameters</td>
                </tr>
                <tr id="nameemfI20040428164816" onMouseOver="rowOver('emfI20040428164816','#C0D8FF')" onMouseOut="rowOut('emfI20040428164816','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47432" target="_bugz">47432</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">emf.edit support for referencing a different resource</td>
                </tr>
                <tr id="nameemfI20040428164817" onMouseOver="rowOver('emfI20040428164817','#C0D8FF')" onMouseOut="rowOut('emfI20040428164817','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40505" target="_bugz">40505</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">org.eclipse.emf.ecore.xmi throws exception for xmi:Extension and elements from other namespaces</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200404080727">
                <b class="title">2.0.0I200404080727</b>
              </a>(17 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004040807271" onMouseOver="rowOver('emfI2004040807271','#C0D8FF')" onMouseOut="rowOut('emfI2004040807271','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57707" target="_bugz">57707</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DBCS:Import *.xsd xml schema file failed</td>
                </tr>
                <tr id="nameemfI2004040807272" onMouseOver="rowOver('emfI2004040807272','#C0D8FF')" onMouseOut="rowOut('emfI2004040807272','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57669" target="_bugz">57669</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Simplify and improve default factory registration</td>
                </tr>
                <tr id="nameemfI2004040807273" onMouseOver="rowOver('emfI2004040807273','#C0D8FF')" onMouseOut="rowOut('emfI2004040807273','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57616" target="_bugz">57616</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">No way to set ItemPropertyDescriptor.filterFlags</td>
                </tr>
                <tr id="nameemfI2004040807274" onMouseOver="rowOver('emfI2004040807274','#C0D8FF')" onMouseOut="rowOut('emfI2004040807274','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57444" target="_bugz">57444</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Null pointer exception saving DataGraph will null root object</td>
                </tr>
                <tr id="nameemfI2004040807275" onMouseOver="rowOver('emfI2004040807275','#C0D8FF')" onMouseOut="rowOut('emfI2004040807275','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57315" target="_bugz">57315</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add Diagnostic support, which will be used in the validation framework</td>
                </tr>
                <tr id="nameemfI2004040807276" onMouseOver="rowOver('emfI2004040807276','#C0D8FF')" onMouseOut="rowOut('emfI2004040807276','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57038" target="_bugz">57038</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NullPointerException when inserting an attribute into a SDO</td>
                </tr>
                <tr id="nameemfI2004040807277" onMouseOver="rowOver('emfI2004040807277','#C0D8FF')" onMouseOut="rowOut('emfI2004040807277','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56919" target="_bugz">56919</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">GenClassImpl.getInterfaceExtends() produces duplicates for rootExtendsInterface other than EObject</td>
                </tr>
                <tr id="nameemfI2004040807278" onMouseOver="rowOver('emfI2004040807278','#C0D8FF')" onMouseOut="rowOut('emfI2004040807278','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide general support for feature map entries in EMF.Edit.</td>
                </tr>
                <tr id="nameemfI2004040807279" onMouseOver="rowOver('emfI2004040807279','#C0D8FF')" onMouseOut="rowOut('emfI2004040807279','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56647" target="_bugz">56647</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XMLHandler/XMIHandlers support for proper xmlns scoping</td>
                </tr>
                <tr id="nameemfI20040408072710" onMouseOver="rowOver('emfI20040408072710','#C0D8FF')" onMouseOut="rowOut('emfI20040408072710','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56190" target="_bugz">56190</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">CopyCommand on objects that reference themselves</td>
                </tr>
                <tr id="nameemfI20040408072711" onMouseOver="rowOver('emfI20040408072711','#C0D8FF')" onMouseOut="rowOut('emfI20040408072711','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56137" target="_bugz">56137</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Parsing invalid boolean value should throw an exception</td>
                </tr>
                <tr id="nameemfI20040408072712" onMouseOver="rowOver('emfI20040408072712','#C0D8FF')" onMouseOut="rowOut('emfI20040408072712','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55829" target="_bugz">55829</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problems with new Data Types</td>
                </tr>
                <tr id="nameemfI20040408072713" onMouseOver="rowOver('emfI20040408072713','#C0D8FF')" onMouseOut="rowOut('emfI20040408072713','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55577" target="_bugz">55577</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Casting DataObject to AnyType object throws ClassCastException</td>
                </tr>
                <tr id="nameemfI20040408072714" onMouseOver="rowOver('emfI20040408072714','#C0D8FF')" onMouseOut="rowOut('emfI20040408072714','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54112" target="_bugz">54112</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">A new option for XMLLoadImpl not to load external DTD in ecore.xmi</td>
                </tr>
                <tr id="nameemfI20040408072715" onMouseOver="rowOver('emfI20040408072715','#C0D8FF')" onMouseOut="rowOut('emfI20040408072715','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53806" target="_bugz">53806</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Perf: Parser pool needed to greatly improve performance</td>
                </tr>
                <tr id="nameemfI20040408072716" onMouseOver="rowOver('emfI20040408072716','#C0D8FF')" onMouseOut="rowOut('emfI20040408072716','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53453" target="_bugz">53453</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Feature request - write out xml DOCTYPE declaration</td>
                </tr>
                <tr id="nameemfI20040408072717" onMouseOver="rowOver('emfI20040408072717','#C0D8FF')" onMouseOut="rowOut('emfI20040408072717','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41704" target="_bugz">41704</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Value automatically selected in combo box</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200403250631">
                <b class="title">2.0.0I200403250631</b>
              </a>(17 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004032506311" onMouseOver="rowOver('emfI2004032506311','#C0D8FF')" onMouseOut="rowOut('emfI2004032506311','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55955" target="_bugz">55955</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Dirty Conflict in Generated Editor</td>
                </tr>
                <tr id="nameemfI2004032506312" onMouseOver="rowOver('emfI2004032506312','#C0D8FF')" onMouseOut="rowOut('emfI2004032506312','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55587" target="_bugz">55587</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Serialize DataGraph as spelled out in the SDO spec</td>
                </tr>
                <tr id="nameemfI2004032506313" onMouseOver="rowOver('emfI2004032506313','#C0D8FF')" onMouseOut="rowOut('emfI2004032506313','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55463" target="_bugz">55463</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Performance improvements can help speed up SDO data accessors</td>
                </tr>
                <tr id="nameemfI2004032506314" onMouseOver="rowOver('emfI2004032506314','#C0D8FF')" onMouseOut="rowOut('emfI2004032506314','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55462" target="_bugz">55462</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EDataGraphImpl needs to implement writeReplace for when it is serialized directly</td>
                </tr>
                <tr id="nameemfI2004032506315" onMouseOver="rowOver('emfI2004032506315','#C0D8FF')" onMouseOut="rowOut('emfI2004032506315','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55379" target="_bugz">55379</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Ant targets dialog rendering error</td>
                </tr>
                <tr id="nameemfI2004032506316" onMouseOver="rowOver('emfI2004032506316','#C0D8FF')" onMouseOut="rowOut('emfI2004032506316','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55276" target="_bugz">55276</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide support for blocking properties from being merged in</td>
                </tr>
                <tr id="nameemfI2004032506317" onMouseOver="rowOver('emfI2004032506317','#C0D8FF')" onMouseOut="rowOut('emfI2004032506317','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55263" target="_bugz">55263</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ClassCastException during init() of user-defined Registry class</td>
                </tr>
                <tr id="nameemfI2004032506318" onMouseOver="rowOver('emfI2004032506318','#C0D8FF')" onMouseOut="rowOut('emfI2004032506318','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=55152" target="_bugz">55152</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">java name problems</td>
                </tr>
                <tr id="nameemfI2004032506319" onMouseOver="rowOver('emfI2004032506319','#C0D8FF')" onMouseOut="rowOut('emfI2004032506319','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54706" target="_bugz">54706</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EMF Editor Crashes</td>
                </tr>
                <tr id="nameemfI20040325063110" onMouseOver="rowOver('emfI20040325063110','#C0D8FF')" onMouseOut="rowOut('emfI20040325063110','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54702" target="_bugz">54702</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide a way to block unused imports from being merged in</td>
                </tr>
                <tr id="nameemfI20040325063111" onMouseOver="rowOver('emfI20040325063111','#C0D8FF')" onMouseOut="rowOut('emfI20040325063111','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54367" target="_bugz">54367</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NPE when accessing bogus feature name in SDO</td>
                </tr>
                <tr id="nameemfI20040325063112" onMouseOver="rowOver('emfI20040325063112','#C0D8FF')" onMouseOut="rowOut('emfI20040325063112','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54271" target="_bugz">54271</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JavaEcoreBuilder should ignore interface in @extends</td>
                </tr>
                <tr id="nameemfI20040325063113" onMouseOver="rowOver('emfI20040325063113','#C0D8FF')" onMouseOut="rowOut('emfI20040325063113','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Change EMF templates to be able to use JETNature for build</td>
                </tr>
                <tr id="nameemfI20040325063114" onMouseOver="rowOver('emfI20040325063114','#C0D8FF')" onMouseOut="rowOut('emfI20040325063114','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Update of not unsettable to unsettable in rose not copied to ecore</td>
                </tr>
                <tr id="nameemfI20040325063115" onMouseOver="rowOver('emfI20040325063115','#C0D8FF')" onMouseOut="rowOut('emfI20040325063115','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Use new code formatter constants in GenModelEditor.</td>
                </tr>
                <tr id="nameemfI20040325063116" onMouseOver="rowOver('emfI20040325063116','#C0D8FF')" onMouseOut="rowOut('emfI20040325063116','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" border="0" alt="emf"><img src="../images/icon-sdo.gif" border="0" alt="sdo"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Handle CTabFolder changes for new UI look</td>
                </tr>
                <tr id="nameemfI20040325063117" onMouseOver="rowOver('emfI20040325063117','#C0D8FF')" onMouseOut="rowOut('emfI20040325063117','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47434" target="_bugz">47434</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">refresh capability for model editors</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200403081633">
                <b class="title">2.0.0I200403081633</b>
              </a>(5 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI2004030816331" onMouseOver="rowOver('emfI2004030816331','#C0D8FF')" onMouseOut="rowOut('emfI2004030816331','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54080" target="_bugz">54080</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Update of not unsettable to unsettable in rose not copied.</td>
                </tr>
                <tr id="nameemfI2004030816332" onMouseOver="rowOver('emfI2004030816332','#C0D8FF')" onMouseOut="rowOut('emfI2004030816332','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54079" target="_bugz">54079</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Use new code formatter constants in GenModelEditor.</td>
                </tr>
                <tr id="nameemfI2004030816333" onMouseOver="rowOver('emfI2004030816333','#C0D8FF')" onMouseOut="rowOut('emfI2004030816333','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54077" target="_bugz">54077</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Handle CTabFolder changes for new UI look.</td>
                </tr>
                <tr id="nameemfI2004030816334" onMouseOver="rowOver('emfI2004030816334','#C0D8FF')" onMouseOut="rowOut('emfI2004030816334','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53772" target="_bugz">53772</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">ListChange should handle index == -1.</td>
                </tr>
                <tr id="nameemfI2004030816335" onMouseOver="rowOver('emfI2004030816335','#C0D8FF')" onMouseOut="rowOut('emfI2004030816335','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53180" target="_bugz">53180</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problem with name collision in XML-schema generated model.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200402251234SL">
                <b class="title">2.0.0I200402251234SL</b>
              </a>(7 Bugs)<br><span class="details">
                <note xmlns="">
<p>
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
</p>
</note>
              </span>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI200402251234SL1" onMouseOver="rowOver('emfI200402251234SL1','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL1','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52312" target="_bugz">52312</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Changed EMF editors (.ecore, .genmodel, etc.) and Editor.javajet template to accommodate new UI in Eclipse 3.0 M7.</td>
                </tr>
                <tr id="nameemfI200402251234SL2" onMouseOver="rowOver('emfI200402251234SL2','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL2','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=52174" target="_bugz">52174</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Fixed bug in ReplaceCommand constructor. Wrong object was being used for the replacement.</td>
                </tr>
                <tr id="nameemfI200402251234SL3" onMouseOver="rowOver('emfI200402251234SL3','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL3','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=51204" target="_bugz">51204</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Fixed empty StringSegment.Element bug that caused NPE when saving an XMLResource.</td>
                </tr>
                <tr id="nameemfI200402251234SL4" onMouseOver="rowOver('emfI200402251234SL4','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL4','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50782" target="_bugz">50782</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Fixed AdapterFactoryLabelProvider and AdapterFactoryContentProvider setAdapterFactory() methods which were not clearing the listener.</td>
                </tr>
                <tr id="nameemfI200402251234SL5" onMouseOver="rowOver('emfI200402251234SL5','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL5','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50176" target="_bugz">50176</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Changed Rose importer to omit derived attributes with stereotype &amp;lt;&amp;lt;reference&amp;gt;&amp;gt;.</td>
                </tr>
                <tr id="nameemfI200402251234SL6" onMouseOver="rowOver('emfI200402251234SL6','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL6','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49269" target="_bugz">49269</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Changed CopyCommand to properly preserve order of copied bi-directional references.</td>
                </tr>
                <tr id="nameemfI200402251234SL7" onMouseOver="rowOver('emfI200402251234SL7','#C0D8FF')" onMouseOut="rowOut('emfI200402251234SL7','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43957" target="_bugz">43957</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Removed recursive build from JET, which caused NPEs in GlobalBuildAction, BuildManager.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200401271738SL">
                <b class="title">2.0.0I200401271738SL</b>
              </a>
              <br><span class="details">
                <note xmlns="">
<p>
There are bug fixes and improvements included with this build, some of which are described below.
Where the description applies to a bug reported through Bugzilla, the Bugzilla number is included after the description.
<ul>
<li>
Use dynamic classpath containers to accomodate breaking runtime changes in Eclipse 3.0 M6.
</li>
</ul>
</p>
</note>
              </span>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200312190637VL">
                <b class="title">2.0.0I200312190637VL</b>
              </a>(2 Bugs)<br><span class="details">
                <note xmlns="">
<p>
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
</p>
</note>
              </span>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI200312190637VL1" onMouseOver="rowOver('emfI200312190637VL1','#C0D8FF')" onMouseOut="rowOut('emfI200312190637VL1','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48838" target="_bugz">48838</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problem occurred when importing a namespace where the only reference to that namespace was in an ecore:reference.Handle imports resolving during XSD model import.</td>
                </tr>
                <tr id="nameemfI200312190637VL2" onMouseOver="rowOver('emfI200312190637VL2','#C0D8FF')" onMouseOut="rowOut('emfI200312190637VL2','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48721" target="_bugz">48721</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Register the package instance against the null target namespace in an XSD model's generated resource factory.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="emf.2.0.0.I200312101532XL">
                <b class="title">2.0.0I200312101532XL</b>
              </a>(13 Bugs)<br><span class="details">
                <note xmlns="">
Initial EMF 2.0 driver. Eclipse 3.0 (M5) based
<p>Eclipse M5 includes breaking API changes which will require regeneration or equivalent hand modification of generated EMF editors.
Since JDK 1.4 dictates the JAXP default implementation,
all dependencies on the Xerces plugin have now been removed from the EMF (and XSD) plugins.
Use -D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a> to choose a JAXP implementation.
E.g., this command will run Eclipse with the implementation used historically:
<pre>eclipse.exe -vmargs -Djava.endorsed.dirs=plugins/org.apache.xerces_4.0.13</pre>
</p>
<p>
<b>Migration from 1.1</b>
</p>
<p>Code regeneration of 1.1 projects is required. There are some breaking changes in this version, specifically in the handling of XML Schema based models. Details are provided below.</p>
<p>
<b>Improved XML Schema Support</b>
</p>
<p>The support for XML Schema has been significantly enhanced in EMF 2.0. Much more of the complexity of XML Schema is now supported,
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
<li>
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
</p>
<p>
<b>OMG MOF 2 Support</b>
</p>
<p>Several changes have been made in EMF 2.0 to align Ecore better with the EMOF (Essential MOF) subset of the MOF 2 Specification.
The following changes are related to this feature:
<ul>
<li>
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
<li>
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
</p>
<p>
<b>Model Import Enhancements</b>
</p>
<p>
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
</p>
<p>
<b>New Generator options and function</b>
</p>
<p>This new function is preliminary and still subject to change. New features include:
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
</p>
<p>
<b>Miscellaneous Bug fixes and Improvements</b>
</p>
<p>
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
</p>
</note>
              </span>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="nameemfI200312101532XL1" onMouseOver="rowOver('emfI200312101532XL1','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL1','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48447" target="_bugz">48447</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Resource creation should only be successful if file was opened</td>
                </tr>
                <tr id="nameemfI200312101532XL2" onMouseOver="rowOver('emfI200312101532XL2','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL2','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48417" target="_bugz">48417</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JETEmitter generated class not found by URLClassLoader</td>
                </tr>
                <tr id="nameemfI200312101532XL3" onMouseOver="rowOver('emfI200312101532XL3','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL3','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47999" target="_bugz">47999</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">EAnnotation written down in context of Rose model</td>
                </tr>
                <tr id="nameemfI200312101532XL4" onMouseOver="rowOver('emfI200312101532XL4','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL4','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47718" target="_bugz">47718</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">notifyChanged method in MappingRootImpl never gets called</td>
                </tr>
                <tr id="nameemfI200312101532XL5" onMouseOver="rowOver('emfI200312101532XL5','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL5','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47497" target="_bugz">47497</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Attribute name: 'class'</td>
                </tr>
                <tr id="nameemfI200312101532XL6" onMouseOver="rowOver('emfI200312101532XL6','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL6','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46803" target="_bugz">46803</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Improved customizability of proxy resolution</td>
                </tr>
                <tr id="nameemfI200312101532XL7" onMouseOver="rowOver('emfI200312101532XL7','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL7','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46230" target="_bugz">46230</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support XML Schema Instance Document Persistence from Rose model derived ECore model</td>
                </tr>
                <tr id="nameemfI200312101532XL8" onMouseOver="rowOver('emfI200312101532XL8','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL8','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45660" target="_bugz">45660</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Incorrect classpath setting for generated editor code on Linux/gtk</td>
                </tr>
                <tr id="nameemfI200312101532XL9" onMouseOver="rowOver('emfI200312101532XL9','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL9','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45606" target="_bugz">45606</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Cannot "reload" emf model</td>
                </tr>
                <tr id="nameemfI200312101532XL10" onMouseOver="rowOver('emfI200312101532XL10','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL10','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45605" target="_bugz">45605</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Cannot generate genmodel for plugin project</td>
                </tr>
                <tr id="nameemfI200312101532XL11" onMouseOver="rowOver('emfI200312101532XL11','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL11','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=42502" target="_bugz">42502</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Rose description text not emitted into Java source (JavaDoc)</td>
                </tr>
                <tr id="nameemfI200312101532XL12" onMouseOver="rowOver('emfI200312101532XL12','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL12','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=40613" target="_bugz">40613</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add JET Nature should be a wizard or at least confirm choice; use File-&gt;New-&gt;Other...-&gt;Java Emitter Templates-&gt;Convert Projects to JET Projects</td>
                </tr>
                <tr id="nameemfI200312101532XL13" onMouseOver="rowOver('emfI200312101532XL13','#C0D8FF')" onMouseOut="rowOut('emfI200312101532XL13','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38069" target="_bugz">38069</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-emf.gif" alt="emf"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">GenModel meta-model is hard-coded in JET</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td class="spacer">
              <br>
            </td>
            <td class="spacer">
              <br>
            </td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd">XSD Release Notes</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.5.2.0.5">2.0.5 Release</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.5.2.0.5">
                <b class="title">
                  <b>2.0.5 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.5.2.0.5RC1">
                <b class="title">
                  <b>2.0.5RC1</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsd2.0.5RC11" onMouseOver="rowOver('xsd2.0.5RC11','#C0D8FF')" onMouseOut="rowOut('xsd2.0.5RC11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=118276&amp;Bugzilla=118276"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=118276" target="_bugz">118276</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[Duplicate] xmlns="" is not considered correctly when loading schema</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.4.2.0.4">2.0.4 Release</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.4.2.0.4">
                <b class="title">
                  <b>2.0.4 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.4.M200509081011">
                <b class="title">2.0.4M200509081011</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2005090810111" onMouseOver="rowOver('xsdM2005090810111','#C0D8FF')" onMouseOut="rowOut('xsdM2005090810111','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=105538&amp;Bugzilla=105538"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=105538" target="_bugz">105538</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[Dupe] Fix JDK5.0 compiler errors</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.3.2.0.3">2.0.3 Release</a>(4 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.3.2.0.3">
                <b class="title">
                  <b>2.0.3 Release</b>
                </b>
              </a>(4 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsd2.0.31" onMouseOver="rowOver('xsd2.0.31','#C0D8FF')" onMouseOut="rowOut('xsd2.0.31','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=99021&amp;Bugzilla=99021"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99021" target="_bugz">99021</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">notice.html missing from XSD zips</td>
                </tr>
                <tr id="namexsd2.0.32" onMouseOver="rowOver('xsd2.0.32','#C0D8FF')" onMouseOut="rowOut('xsd2.0.32','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=99020&amp;Bugzilla=99020"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=99020" target="_bugz">99020</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">notice.html missing from EMF zips</td>
                </tr>
                <tr id="namexsd2.0.33" onMouseOver="rowOver('xsd2.0.33','#C0D8FF')" onMouseOut="rowOut('xsd2.0.33','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=98877&amp;Bugzilla=98877"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98877" target="_bugz">98877</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Migrate license from CPL to EPL [2.0.3]</td>
                </tr>
                <tr id="namexsd2.0.34" onMouseOver="rowOver('xsd2.0.34','#C0D8FF')" onMouseOut="rowOut('xsd2.0.34','#EEEEEE')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=98876&amp;Bugzilla=98876"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=98876" target="_bugz">98876</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Migrate license from CPL to EPL [2.0.3]</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.3.2.0.3RC2a">
                <b class="title">
                  <b>2.0.3RC2a</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.3.2.0.3RC2">
                <b class="title">
                  <b>2.0.3RC2</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.3.2.0.3RC1">
                <b class="title">
                  <b>2.0.3RC1</b>
                </b>
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.2.2.0.2">2.0.2 Release</a>
            </td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.2.0.2">
                <b class="title">
                  <b>2.0.2 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.2.0.2RC3">
                <b class="title">
                  <b>2.0.2RC3</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200503081329">
                <b class="title">2.0.2M200503081329</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.2.0.2RC2">
                <b class="title">
                  <b>2.0.2RC2</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsd2.0.2RC21" onMouseOver="rowOver('xsd2.0.2RC21','#C0D8FF')" onMouseOut="rowOut('xsd2.0.2RC21','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=86190&amp;Bugzilla=86190"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=86190" target="_bugz">86190</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[DUPE] xsd doc : toc.xml has invalid xml?</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200502171209">
                <b class="title">2.0.2M200502171209</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200502100700">
                <b class="title">2.0.2M200502100700</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200502030700">
                <b class="title">2.0.2M200502030700</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200501270700">
                <b class="title">2.0.2M200501270700</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.2.M200501191212">
                <b class="title">2.0.2M200501191212</b>
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.1.2.0.1">2.0.1 Release</a>(15 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.2.0.1">
                <b class="title">
                  <b>2.0.1 Release</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsd2.0.11" onMouseOver="rowOver('xsd2.0.11','#C0D8FF')" onMouseOut="rowOut('xsd2.0.11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support for backup/secondary/multiple Update URL(s)</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.2.0.1RC2">
                <b class="title">
                  <b>2.0.1RC2</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.2.0.1RC1">
                <b class="title">
                  <b>2.0.1RC1</b>
                </b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsd2.0.1RC11" onMouseOver="rowOver('xsd2.0.1RC11','#C0D8FF')" onMouseOut="rowOut('xsd2.0.1RC11','#FFFFFF')">
                  <td></td>
                  <td>
                    <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd&amp;bug=73004&amp;Bugzilla=73004"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"></a>
                  </td>
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73004" target="_bugz">73004</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support for backup/secondary/multiple Update URL(s)</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200409011021">
                <b class="title">2.0.1M200409011021</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004090110211" onMouseOver="rowOver('xsdM2004090110211','#C0D8FF')" onMouseOut="rowOut('xsdM2004090110211','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=73024" target="_bugz">73024</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XSDSchema.validate() block</td>
                </tr>
                <tr id="namexsdM2004090110212" onMouseOver="rowOver('xsdM2004090110212','#C0D8FF')" onMouseOut="rowOut('xsdM2004090110212','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72852" target="_bugz">72852</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Using a redefined group in the original schema</td>
                </tr>
                <tr id="namexsdM2004090110213" onMouseOver="rowOver('xsdM2004090110213','#C0D8FF')" onMouseOut="rowOut('xsdM2004090110213','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70176" target="_bugz">70176</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">[osgi] headers incorrectly cached when a bundle is installed from the update manager</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200408261626">
                <b class="title">2.0.1M200408261626</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200408260844">
                <b class="title">2.0.1M200408260844</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004082608441" onMouseOver="rowOver('xsdM2004082608441','#C0D8FF')" onMouseOut="rowOut('xsdM2004082608441','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72532" target="_bugz">72532</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Permission  access denied</td>
                </tr>
                <tr id="namexsdM2004082608442" onMouseOver="rowOver('xsdM2004082608442','#C0D8FF')" onMouseOut="rowOut('xsdM2004082608442','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72384" target="_bugz">72384</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">DOMException when calling XSDSchema.createElement()</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200408190924">
                <b class="title">2.0.1M200408190924</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004081909241" onMouseOver="rowOver('xsdM2004081909241','#C0D8FF')" onMouseOut="rowOut('xsdM2004081909241','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=72018" target="_bugz">72018</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XSD Serialization has no indents</td>
                </tr>
                <tr id="namexsdM2004081909242" onMouseOver="rowOver('xsdM2004081909242','#C0D8FF')" onMouseOut="rowOut('xsdM2004081909242','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71882" target="_bugz">71882</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Including elements from a schema with no namespace</td>
                </tr>
                <tr id="namexsdM2004081909243" onMouseOver="rowOver('xsdM2004081909243','#C0D8FF')" onMouseOut="rowOut('xsdM2004081909243','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support frozen Ecore instances for improved performance</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200408120834">
                <b class="title">2.0.1M200408120834</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004081208341" onMouseOver="rowOver('xsdM2004081208341','#C0D8FF')" onMouseOut="rowOut('xsdM2004081208341','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71868" target="_bugz">71868</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support frozen Ecore instances for improved performance</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200408040957">
                <b class="title">2.0.1M200408040957</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004080409571" onMouseOver="rowOver('xsdM2004080409571','#C0D8FF')" onMouseOut="rowOut('xsdM2004080409571','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=71116" target="_bugz">71116</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Generation from Schema: NullPointerException in XSDECoreBuilder</td>
                </tr>
                <tr id="namexsdM2004080409572" onMouseOver="rowOver('xsdM2004080409572','#C0D8FF')" onMouseOut="rowOut('xsdM2004080409572','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">wrong recognize of length of restricted xsd:hexBinary</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200407280859">
                <b class="title">2.0.1M200407280859</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004072808591" onMouseOver="rowOver('xsdM2004072808591','#C0D8FF')" onMouseOut="rowOut('xsdM2004072808591','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=70958" target="_bugz">70958</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">wrong recognize of length of restricted xsd:hexBinary</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200407211027">
                <b class="title">2.0.1M200407211027</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.1.M200407150937">
                <b class="title">2.0.1M200407150937</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdM2004071509371" onMouseOver="rowOver('xsdM2004071509371','#C0D8FF')" onMouseOut="rowOut('xsdM2004071509371','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=69081" target="_bugz">69081</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Resolution mechanism for schemas does not use the resolved schema</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="1" class="normal"></td>
          </tr>
          <tr class="content-header">
            <td colspan="1" class="sub-header" width="99%">
              <a name="xsd.2.0.0.2.0.0">2.0.0 Release</a>(35 Bugs)</td>
            <td width="5" align="top" valign="right">
              <a class="bodyText" style="text-decoration:none" href="#top">^</a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.2.0.0">
                <b class="title">
                  <b>2.0.0 Release</b>
                </b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200406250129">
                <b class="title">2.0.0I200406250129</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200406211000">
                <b class="title">2.0.0I200406211000</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004062110001" onMouseOver="rowOver('xsdI2004062110001','#C0D8FF')" onMouseOut="rowOut('xsdI2004062110001','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=67934" target="_bugz">67934</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">BasicEObjectImpl.eDerivedStructuralFeatureID(EStructuralFeature) gives bad result for open content features</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200406171028">
                <b class="title">2.0.0I200406171028</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004061710281" onMouseOver="rowOver('xsdI2004061710281','#C0D8FF')" onMouseOut="rowOut('xsdI2004061710281','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66860" target="_bugz">66860</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Fix EMF editors to avoid new null selection assertion in SelectionChangedEvent in RC2</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200406100948">
                <b class="title">2.0.0I200406100948</b>
              </a>(8 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004061009481" onMouseOver="rowOver('xsdI2004061009481','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009481','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66327" target="_bugz">66327</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Use equalsIgnoreCase to match the public ID of the XMLSchema.dtd</td>
                </tr>
                <tr id="namexsdI2004061009482" onMouseOver="rowOver('xsdI2004061009482','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009482','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66232" target="_bugz">66232</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Produce unique getAliasName for anonymous union members</td>
                </tr>
                <tr id="namexsdI2004061009483" onMouseOver="rowOver('xsdI2004061009483','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009483','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66185" target="_bugz">66185</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Avoid the use of CCombo in the generated wizards.</td>
                </tr>
                <tr id="namexsdI2004061009484" onMouseOver="rowOver('xsdI2004061009484','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009484','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66154" target="_bugz">66154</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support ecore:ignore for facets, XSDAnnotation, &amp;lt;documentation&amp;gt;, and &amp;lt;appinfo&amp;gt;.</td>
                </tr>
                <tr id="namexsdI2004061009485" onMouseOver="rowOver('xsdI2004061009485','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009485','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66102" target="_bugz">66102</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Complete the support for validating according to XML Schema simple facets</td>
                </tr>
                <tr id="namexsdI2004061009486" onMouseOver="rowOver('xsdI2004061009486','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009486','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=66032" target="_bugz">66032</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add activities to EMF and XSD</td>
                </tr>
                <tr id="namexsdI2004061009487" onMouseOver="rowOver('xsdI2004061009487','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009487','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65703" target="_bugz">65703</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">'Save' action does'nt work in the XSD Editor</td>
                </tr>
                <tr id="namexsdI2004061009488" onMouseOver="rowOver('xsdI2004061009488','#C0D8FF')" onMouseOut="rowOut('xsdI2004061009488','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=65672" target="_bugz">65672</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">maxLength not permitted in string</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200406030436">
                <b class="title">2.0.0I200406030436</b>
              </a>(4 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004060304361" onMouseOver="rowOver('xsdI2004060304361','#C0D8FF')" onMouseOut="rowOut('xsdI2004060304361','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=64864" target="_bugz">64864</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">overview tree stops responding</td>
                </tr>
                <tr id="namexsdI2004060304362" onMouseOver="rowOver('xsdI2004060304362','#C0D8FF')" onMouseOut="rowOut('xsdI2004060304362','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=63916" target="_bugz">63916</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NPE during Schema validation</td>
                </tr>
                <tr id="namexsdI2004060304363" onMouseOver="rowOver('xsdI2004060304363','#C0D8FF')" onMouseOut="rowOut('xsdI2004060304363','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">THAI: XSD Editor have problem with Thai characters.</td>
                </tr>
                <tr id="namexsdI2004060304364" onMouseOver="rowOver('xsdI2004060304364','#C0D8FF')" onMouseOut="rowOut('xsdI2004060304364','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62314" target="_bugz">62314</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Enhancement to enable dynamic and generated EPackage usage across JVMs</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200405200923">
                <b class="title">2.0.0I200405200923</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004052009231" onMouseOver="rowOver('xsdI2004052009231','#C0D8FF')" onMouseOut="rowOut('xsdI2004052009231','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62440" target="_bugz">62440</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">THAI: XSD Editor have problem with Thai characters.</td>
                </tr>
                <tr id="namexsdI2004052009232" onMouseOver="rowOver('xsdI2004052009232','#C0D8FF')" onMouseOut="rowOut('xsdI2004052009232','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=62422" target="_bugz">62422</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support generator control over runtime compatibility and Rich Client Platform</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200405131028">
                <b class="title">2.0.0I200405131028</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004051310281" onMouseOver="rowOver('xsdI2004051310281','#C0D8FF')" onMouseOut="rowOut('xsdI2004051310281','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61736" target="_bugz">61736</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Support an ecore:opposite annotation for XSDEcoreBuilder</td>
                </tr>
                <tr id="namexsdI2004051310282" onMouseOver="rowOver('xsdI2004051310282','#C0D8FF')" onMouseOut="rowOut('xsdI2004051310282','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58972" target="_bugz">58972</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide better default substitution group/abstract element support and provide ecore:featureMap and ecore:mixed for more flexible control</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200405060858">
                <b class="title">2.0.0I200405060858</b>
              </a>(3 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004050608581" onMouseOver="rowOver('xsdI2004050608581','#C0D8FF')" onMouseOut="rowOut('xsdI2004050608581','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=61111" target="_bugz">61111</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Add the first version of a constraint validation framework</td>
                </tr>
                <tr id="namexsdI2004050608582" onMouseOver="rowOver('xsdI2004050608582','#C0D8FF')" onMouseOut="rowOut('xsdI2004050608582','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Annotation appinfo corrupts element declaration type</td>
                </tr>
                <tr id="namexsdI2004050608583" onMouseOver="rowOver('xsdI2004050608583','#C0D8FF')" onMouseOut="rowOut('xsdI2004050608583','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Redefinition of type does not affect indirectly included derived type</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200404291310">
                <b class="title">2.0.0I200404291310</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004042913101" onMouseOver="rowOver('xsdI2004042913101','#C0D8FF')" onMouseOut="rowOut('xsdI2004042913101','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=60438" target="_bugz">60438</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Annotation appinfo corrupts element declaration type</td>
                </tr>
                <tr id="namexsdI2004042913102" onMouseOver="rowOver('xsdI2004042913102','#C0D8FF')" onMouseOut="rowOut('xsdI2004042913102','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=58222" target="_bugz">58222</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Redefinition of type does not affect indirectly included derived type</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200404281648">
                <b class="title">2.0.0I200404281648</b>
              </a>
              <table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004042816481" onMouseOver="rowOver('xsdI2004042816481','#C0D8FF')" onMouseOut="rowOut('xsdI2004042816481','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=57686" target="_bugz">57686</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">NullPointerException activating Sample XML Schema Editor from M8</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200404080727">
                <b class="title">2.0.0I200404080727</b>
              </a>(4 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004040807271" onMouseOver="rowOver('xsdI2004040807271','#C0D8FF')" onMouseOut="rowOut('xsdI2004040807271','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56912" target="_bugz">56912</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Provide general support for feature map entries in EMF.Edit.</td>
                </tr>
                <tr id="namexsdI2004040807272" onMouseOver="rowOver('xsdI2004040807272','#C0D8FF')" onMouseOut="rowOut('xsdI2004040807272','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56812" target="_bugz">56812</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">JS: xsd-&amp;gt;ecore converter does not process nillable properly</td>
                </tr>
                <tr id="namexsdI2004040807273" onMouseOver="rowOver('xsdI2004040807273','#C0D8FF')" onMouseOut="rowOut('xsdI2004040807273','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56328" target="_bugz">56328</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Ensure that includes/redefines of a cloned included/redefined schema are computed</td>
                </tr>
                <tr id="namexsdI2004040807274" onMouseOver="rowOver('xsdI2004040807274','#C0D8FF')" onMouseOut="rowOut('xsdI2004040807274','#EEEEEE')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=56269" target="_bugz">56269</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">XSDSchema.validate() does not return and leads to an OutOfMemory Exception</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200403250631">
                <b class="title">2.0.0I200403250631</b>
              </a>(5 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI2004032506311" onMouseOver="rowOver('xsdI2004032506311','#C0D8FF')" onMouseOut="rowOut('xsdI2004032506311','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54289" target="_bugz">54289</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Bad performance for validating XSD with lots of &amp;lt;all&amp;gt;</td>
                </tr>
                <tr id="namexsdI2004032506312" onMouseOver="rowOver('xsdI2004032506312','#C0D8FF')" onMouseOut="rowOut('xsdI2004032506312','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54203" target="_bugz">54203</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Types and elements are not visible when an include is added</td>
                </tr>
                <tr id="namexsdI2004032506313" onMouseOver="rowOver('xsdI2004032506313','#C0D8FF')" onMouseOut="rowOut('xsdI2004032506313','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=54201" target="_bugz">54201</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Change EMF templates to be able to use JETNature for build</td>
                </tr>
                <tr id="namexsdI2004032506314" onMouseOver="rowOver('xsdI2004032506314','#C0D8FF')" onMouseOut="rowOut('xsdI2004032506314','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53776" target="_bugz">53776</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Cannot generate XSD for model</td>
                </tr>
                <tr id="namexsdI2004032506315" onMouseOver="rowOver('xsdI2004032506315','#C0D8FF')" onMouseOut="rowOut('xsdI2004032506315','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=53421" target="_bugz">53421</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Problems not removed after fixing</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200403081633">
                <b class="title">2.0.0I200403081633</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200402251234SL">
                <b class="title">2.0.0I200402251234SL</b>
              </a>(2 Bugs)<table width="99%" cellspacing="0" cellpadding="2">
                <tr id="namexsdI200402251234SL1" onMouseOver="rowOver('xsdI200402251234SL1','#C0D8FF')" onMouseOut="rowOut('xsdI200402251234SL1','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=50222" target="_bugz">50222</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">The getPropertyDescriptors() method of some of the XSD facet item providers was using the wrong "Value" property.</td>
                </tr>
                <tr id="namexsdI200402251234SL2" onMouseOver="rowOver('xsdI200402251234SL2','#C0D8FF')" onMouseOut="rowOut('xsdI200402251234SL2','#FFFFFF')">
                  <td></td>
                  <td align="right">
                    <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=49692" target="_bugz">49692</a>
                  </td>
                  <td></td>
                  <td>
                    <nobr><img src="../images/icon-xsd.gif" alt="xsd"></nobr>
                  </td>
                  <td></td>
                  <td width="99%">Changed XSD2GenModel to initialize GenModel.modelName to avoid exception when viewing .genmodel file in the IDE.</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200401271738SL">
                <b class="title">2.0.0I200401271738SL</b>
              </a>
            </td>
          </tr>
          <tr valign="top" bgcolor="#FFFFFF">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200312190637VL">
                <b class="title">2.0.0I200312190637VL</b>
              </a>
              <br><span class="details">
                <note xmlns="">
<p>
There are few minor bug fixes and improvements included with this build.
<ul>
<li>
Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=48894">48894</a>
provides support for processing instructions in the XSDParser.
</li>
<li>
Named components with equal name and namespace are sorted by hashCode.
</li>
</ul>
</p>
</note>
              </span>
            </td>
          </tr>
          <tr valign="top" bgcolor="#EEEEEE">
            <td class="normal" align="left" width="99%" colspan="2">
              <a name="xsd.2.0.0.I200312101532XL">
                <b class="title">2.0.0I200312101532XL</b>
              </a>
              <br><span class="details">
                <note xmlns="">
<p>
There are numerous bug fixes and improvements included with this build, the most significant of which is described below.
<ul>
<li>
All dependencies on Xerces have been eliminated so XSD can be used with any JAXP implementation.
Use -D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a>
to choose a JAXP implementation.
E.g., this command will run Eclipse with the implementation used historically:
<pre>
eclipse.exe -vmargs -Djava.endorsed.dirs=plugins/org.apache.xerces_4.0.13
</pre>
</li>
<li>
A large &lt;all&gt; model group's UPA contstraint is validated as if it were &lt;choice maxOccurs="unbounded"&gt;
Similarly, large maxOccurs are reduced in value
to allow UPA constraint validation for overly large content models,
i.e., Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=47488">47488</a> is fixed.
</li>
<li>
XSDResourceImpl has been generalized so that it can handle a document with multiple embedded schemas,
i.e., .wsdl files are directly supported.
</li>
<li>
XSDSchemaLocator is provided to allow clients to specialize how schemas are located;
it's used internally to ensure that imports between schemas embedded in a document, i.e., a .wsdl file,
can will be resolved to the appropriate schema within that document.
</li>
<li>
XSDSchemaLocationResolver is provided to allow clients to specialize how schemas locations are resolved,
i.e., bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46188">46188</a> is fixed.
This fix is is also available in the 1.1.1.1 maintenance release.
</li>
<li>
The XML namespace schema can now be imported without an explicit schema location and it will load the cached local version.
</li>
</ul>
</p>
</note>
              </span>
            </td>
          </tr>
          <tr>
            <td class="spacer">
              <br>
            </td>
            <td class="spacer">
              <br>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
<!-- content ends -->

<?php $pre="../"; include "../includes/footer.php"; ?>
<!-- $Id: release-notes2.0.php,v 1.1 2006/06/28 21:02:50 nickb Exp $ -->