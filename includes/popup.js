// pop a window?
popWinUp=0;
ns = (navigator.appVersion.indexOf("MSIE")<0) ? true : false; 
ns4 = ns && ((navigator.appVersion.indexOf("4.")>=0) ? true : false); //alert(ns+","+ns4);
function popWin(xURL,xX,xY) { 
	if (!ns) { xX+=17; xY+=8; }
	if (!ns && popWinUp) { poppedWin.close(); popWinUp=0; }
		//poppedWin=window.open(xURL,'PopWin','width=' + xX + ',height=' + xY + ',resizable=yes,title=yes,toolbar=no,scrollbars=yes,screenX=40,screenY=5,top=40,left=5');
	poppedWin=window.open(xURL,'PopWin','width=' + xX + ',height=' + xY + ',resizable=yes,title=yes,toolbar=no,scrollbars=yes,screenX=5,screenY=5,top=5,left=5');
	popWinUp=1;
   if (ns && poppedWin) { poppedWin.focus(); }
 }
