<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>EMF Update Manager Site</h3>
		<p>To install these plugins, point your Eclipse Update Manager at this site. For more on how to do this, <a href="http://www.eclipse.org/emf/docs.php?doc=docs/UsingUpdateManager/UsingUpdateManager.html">click here</a>. <a href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/updates/site.xml&amp;format=xml">Mirrors available</a>.
		</p>
		<ul>
			<li>
				Help
				<ul>
					<li>
						Software Updates
						<ul>
							<li>
								Find and Install...
								<ul>
									<li>
										Search for new features to install
										<ul>
											<li>
											Add Update Site...<br/>
											* Name: <b>EMF Update Manager Site</b><br/>
											* URL: <b><a href="http://download.eclipse.org/tools/emf/updates/site.xml" target="_um">http://download.eclipse.org/tools/emf/updates/site.xml</a></b> (Releases)<br/>
											(or): <b><a href="http://download.eclipse.org/tools/emf/updates/site-interim.xml" target="_um">http://download.eclipse.org/tools/emf/updates/site-interim.xml</a></b> (I, M and S Builds)
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- this doesn't really fit anywhere anymore... -->
<!-- <img alt="how to" src="http://www.eclipse.org/images/howto_banner.jpg" height="111" width="272"/> -->
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - EMF - Update Manager";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/um.css"/>');

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
