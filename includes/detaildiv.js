/*
http://isohunt.com Interface Javascript
by Gary Fung - email: gary{REPLACE_WITH_THE_AT_SIGN}isohunt.com

Feel free to use / mod this to your heart's content,
but you must keep these lines to acknowledge where this code originated.
Comments, mods or additions you'd like add to this script? Post it here:
http://isohunt.com/forum/viewforum.php?f=1

Tip popup functions adapted from AWStats: http://awstats.sourceforge.net/
*/
var smooth_timer;
function smoothHeight(id, curH, targetH, stepH, mode) {
  diff = targetH - curH;
  if (diff != 0) {
    newH = (diff > 0) ? curH + stepH : curH - stepH;
    ((document.getElementById) ? document.getElementById(id) : eval("document.all['" + id + "']")).style.height = newH + "px";
    if (smooth_timer) window.clearTimeout(smooth_timer);
    smooth_timer = window.setTimeout( "smoothHeight('" + id + "'," + newH + "," + targetH + "," + stepH + ",'" + mode + "')", 20 );
  }
  else if (mode != "o") ((document.getElementById) ? document.getElementById(mode) : eval("document.all['" + mode + "']")).style.display="none";
}
function servOC(i,count) {
  var trObj = (document.getElementById) ? document.getElementById('ihtr' + i) : eval("document.all['ihtr" + i + "']");
  var nameObj = (document.getElementById) ? document.getElementById('name' + i) : eval("document.all['name" + i + "']");
  var ifObj = (document.getElementById) ? document.getElementById('ihif' + i) : eval("document.all['ihif" + i + "']");
  if (trObj != null) {
    targetH=Math.round(count/8)*21;
    if (trObj.style.display=="none") {
      trObj.style.display="";
      smoothHeight('ihif' + i, 0, targetH, 42, 'o');
    }
    else {
      smoothHeight('ihif' + i, targetH, 0, 42, 'ihtr' + i);
    }
  }
}

function rowOver(i, bColor) { //alert(i+"\n"+bColor);
  var nameObj = (document.getElementById) ? document.getElementById('name' + i) : eval("document.all['name" + i + "']");
  if (bColor && nameObj != null) nameObj.style.background=bColor;
}
function rowOut(i, bColor) {
  var trObj = (document.getElementById) ? document.getElementById('ihtr' + i) : eval("document.all['ihtr" + i + "']");
  var nameObj = (document.getElementById) ? document.getElementById('name' + i) : eval("document.all['name" + i + "']");
  if (bColor && (trObj == null || trObj.style.display=="none")) nameObj.style.background=bColor;
}
